<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RendezVousController extends Controller
{
    
    public function index(Request $request)
    {
        $query = RendezVous::query();
        // Vos filtres existants...
    
        // Charger les rendez-vous avec les informations des voitures (et des clients via les voitures)
        $rendezvous = $query->with('voiture.client')->get();
    
        // Transformer les données pour inclure les informations de la voiture et du client
        $rendezvousTransformed = $rendezvous->map(function ($item) {
            // Décodez le champ 'services' si nécessaire
            $item->services = isset($item->services) ? json_decode($item->services, true) : null;
            $item->tel = $item->voiture->client->telephone;
            // Ajouter des informations de la voiture et du client directement à l'objet de rendez-vous
            if ($item->voiture) { 
                $item->voiture_details = [
                    'marque' => $item->voiture->marque,
                    'modele' => $item->voiture->modele,
                    // Ajoutez d'autres champs nécessaires de la voiture
                ];
                // Si le client est chargé via la voiture, incluez également ces informations
                if ($item->voiture->client) {
                    $item->client_details = [
                        'nom' => $item->voiture->client->nom,
                        'prenom' => $item->voiture->client->prenom,
                        // Ajoutez d'autres champs nécessaires du client
                    ];
                }
            }
    
            return $item;
        });
    
        return response()->json(['data' => $rendezvousTransformed]);
    }

    public function getRdvClient(Request $request)
    {
        // Récupère l'utilisateur actuellement authentifié
        $user = Auth::guard('client')->user();
        // Vérifie si un utilisateur est bien authentifié
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non authentifié'], 401);
        }

        // Récupère tous les rendez-vous liés aux voitures de l'utilisateur connecté
        $rendezvous = RendezVous::whereHas('voiture', function ($query) use ($user) {
            $query->whereHas('client', function ($query) use ($user) {
                $query->where('id', $user->id);
            });
        })->with(['voiture.client'])->get();

        // Transformer les données pour inclure les informations de la voiture et du client
        $rendezvousTransformed = $rendezvous->map(function ($item) {
            $item->services = json_decode($item->services, true);
            return [
                'id' => $item->id,
                'services' => $item->services,
                'dateHeureDebut' => $item->dateHeureDebut,
                'dateHeureFin' => $item->dateHeureFin,
                'commentaire' => $item->commentaire,
                'voiture_details' => [
                    'marque' => $item->voiture->marque,
                    'modele' => $item->voiture->modele,
                ],
                'client_details' => [
                    'nom' => $item->voiture->client->nom,
                    'prenom' => $item->voiture->client->prenom,
                ]
            ];
        });

        return response()->json(['data' => $rendezvousTransformed]);
    }    

    // Créer un nouveau rendez-vous
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'services' => 'required', // Assure-toi que les règles de validation correspondent à tes besoins
            'dateHeureDebut' => 'required|date',
            'dateHeureFin' => 'required|date',
            'commentaire' => 'nullable|string',
            'notificationEnvoye' => 'required|boolean',
            'id_Voiture' => 'required|integer', // Ajoute des règles de validation supplémentaires comme nécessaire
            'id_PageGarage' => 'required|integer',
            'id_Statut' => 'required|integer',
        ]);
    
        $rendezvous = RendezVous::create($validatedData);
        return response()->json(['data' => $rendezvous], 201);
    }
    

    public function show($id)
    {
        $rendezvous = RendezVous::with('voiture.client')->findOrFail($id);
        return response()->json(['data' => $rendezvous]);
    }
    

    // Mettre à jour un rendez-vous
    public function update(Request $request, $id)
    {
        $rendezvous = RendezVous::findOrFail($id);
        $rendezvous->update($request->all()); // Utilise $request->all() ou mieux, valide et nettoie tes données d'abord
        return response()->json(['data' => $rendezvous]);
    }

    // Supprimer un rendez-vous
    public function destroy($id)
    {
        $rendezvous = RendezVous::findOrFail($id);
        $rendezvous->delete();
        return response()->json(['message' => 'Rendez-vous supprimé avec succès']);
    }

    // Trouve des rendez-vous par ID d'utilisateur avec des filtres de date
    private function findByDate($userId, $startDate, $endDate)
    {
        $query = RendezVous::where('user_id', $userId);

        if ($startDate && $endDate) {
            $query->whereBetween('date', [Carbon::parse($startDate), Carbon::parse($endDate)]);
        }

        return $query->get();
    }



    // Récupère les rendez-vous par jour avec une limite pour les utilisateurs publics
    public function findRdvsByDayWithLimitPublic(Request $request)
    {
        $userId = $request->query('userId');
        $startDate = $request->query('startDate');
        $maxDays = $request->query('maxDays', 7);

        $results = $this->findRdvsByDayWithLimit($userId, $startDate, $maxDays, false);

        return response()->json(['data' => $results]);
    }

    // Récupère les rendez-vous par jour avec une limite pour les prestataires
    public function findRdvsByDayWithLimitPro(Request $request)
    {
        $prestaId = $request->query('prestaId');
        $startDate = $request->query('startDate');
        $confirm = $request->query('confirm', true);

        $results = $this->findRdvsByDayWithLimit($prestaId, $startDate, null, true, $confirm);

        return response()->json(['data' => $results]);
    }

    // Méthode helper pour chercher des rendez-vous par jour avec une limite, utilisée par les deux méthodes publiques ci-dessus
    private function findRdvsByDayWithLimit($userId, $startDate, $maxDays, $isPresta = false, $confirm = null)
    {
        $dateCursor = Carbon::parse($startDate);
        $results = [];
        $daysIterated = 0;
        $maxDays = $maxDays ?? 7; // Utiliser la valeur par défaut si non spécifiée

        while ($daysIterated < $maxDays) {
            $nextDayCursor = $dateCursor->copy()->addDay();
            $rdvs = $isPresta ? $this->findByPrestaId($userId, $dateCursor->toDateString(), $nextDayCursor->toDateString(), $confirm) :
                                $this->findByUserId($userId, $dateCursor->toDateString(), $nextDayCursor->toDateString());

            if ($rdvs->count() > 0) {
                array_push($results, ...$rdvs->toArray());
            }

            $dateCursor = $nextDayCursor;
            $daysIterated++;
        }

        return $results;
    }


    public function getRdvEnCours(Request $request)
    {
        $rendezvous = RendezVous::whereIn('id_Statut', [3])
        ->with('voiture.client')
        ->get();
    
        // Transformer les données pour inclure les informations de la voiture et du client
        $rendezvousTransformed = $rendezvous->map(function ($item) {
            // Décodez le champ 'services' si nécessaire
            $item->services = isset($item->services) ? json_decode($item->services, true) : null;
            $item->tel = $item->voiture->client->telephone;
            // Ajouter des informations de la voiture et du client directement à l'objet de rendez-vous
            if ($item->voiture) { 
                $item->voiture_details = [
                    'marque' => $item->voiture->marque,
                    'modele' => $item->voiture->modele,
                    // Ajoutez d'autres champs nécessaires de la voiture
                ];
                // Si le client est chargé via la voiture, incluez également ces informations
                if ($item->voiture->client) {
                    $item->client_details = [
                        'nom' => $item->voiture->client->nom,
                        'prenom' => $item->voiture->client->prenom,
                        // Ajoutez d'autres champs nécessaires du client
                    ];
                }
            }
    
            return $item;
        });
    
        return response()->json(['data' => $rendezvousTransformed]);
    }

    public function getRdvConfirme(Request $request)
    {

        $rendezvous = RendezVous::whereIn('id_Statut', [1])
        ->with('voiture.client')
        ->get();
    
        // Transformer les données pour inclure les informations de la voiture et du client
        $rendezvousTransformed = $rendezvous->map(function ($item) {
            // Décodez le champ 'services' si nécessaire
            $item->services = isset($item->services) ? json_decode($item->services, true) : null;
            $item->tel = $item->voiture->client->telephone;
            // Ajouter des informations de la voiture et du client directement à l'objet de rendez-vous
            if ($item->voiture) { 
                $item->voiture_details = [
                    'marque' => $item->voiture->marque,
                    'modele' => $item->voiture->modele,
                    // Ajoutez d'autres champs nécessaires de la voiture
                ];
                // Si le client est chargé via la voiture, incluez également ces informations
                if ($item->voiture->client) {
                    $item->client_details = [
                        'nom' => $item->voiture->client->nom,
                        'prenom' => $item->voiture->client->prenom,
                        // Ajoutez d'autres champs nécessaires du client
                    ];
                }
            }
    
            return $item;
        });
    
        return response()->json(['data' => $rendezvousTransformed]);
    }

    public function getRdvNonConfirme(Request $request)
    {
        $rendezvous = RendezVous::whereIn('id_Statut', [2])
        ->with('voiture.client')
        ->get();
    
        // Transformer les données pour inclure les informations de la voiture et du client
        $rendezvousTransformed = $rendezvous->map(function ($item) {
            // Décodez le champ 'services' si nécessaire
            $item->services = isset($item->services) ? json_decode($item->services, true) : null;
            $item->tel = $item->voiture->client->telephone;
            // Ajouter des informations de la voiture et du client directement à l'objet de rendez-vous
            if ($item->voiture) { 
                $item->voiture_details = [
                    'marque' => $item->voiture->marque,
                    'modele' => $item->voiture->modele,
                    // Ajoutez d'autres champs nécessaires de la voiture
                ];
                // Si le client est chargé via la voiture, incluez également ces informations
                if ($item->voiture->client) {
                    $item->client_details = [
                        'nom' => $item->voiture->client->nom,
                        'prenom' => $item->voiture->client->prenom,
                        // Ajoutez d'autres champs nécessaires du client
                    ];
                }
            }
    
            return $item;
        });
    
        return response()->json(['data' => $rendezvousTransformed]);
    }
    
    public function confirmerRendezVous($id)
    {
        // Trouver le rendez-vous par son ID
        $rendezvous = RendezVous::findOrFail($id);

        // Mettre à jour le statut du rendez-vous à "Confirmé"
        $rendezvous->id_Statut = 1; // ID 1 pour "Confirmé", selon vos seeds

        // Sauvegarder les changements
        $rendezvous->save();

        // Retourner une réponse
        return response()->json(['message' => 'Rendez-vous confirmé avec succès', 'data' => $rendezvous]);
    }
    public function terminerRendezVous($id)
    {
        // Trouver le rendez-vous par son ID
        $rendezvous = RendezVous::findOrFail($id);

        // Mettre à jour le statut du rendez-vous à "Confirmé"
        $rendezvous->id_Statut = 4; // ID 1 pour "Confirmé", selon vos seeds

        // Sauvegarder les changements
        $rendezvous->save();

        // Retourner une réponse
        return response()->json(['message' => 'Rendez-vous terminé avec succès']);
    }
    
}
