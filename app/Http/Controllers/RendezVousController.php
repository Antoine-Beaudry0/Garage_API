<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RendezVous;
use App\Models\Service;
use App\Models\PageGarage;
use App\Models\User;
use Carbon\Carbon;

class RendezVousController extends Controller
{
    public function find(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non connecté'], 401);
        }
    
        // Récupération des paramètres de la requête
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate', null); // Si aucune endDate n'est fournie, on ne l'utilise pas dans le filtre
        $confirm = $request->query('confirm') === 'true';
        $limit = $request->query('limit', 10); // Nombre de RDVs à retourner par requête, pour le lazy loading
    
        $query = RendezVous::query();
    
        // Filtrer par utilisateur si nécessaire, et d'autres logiques spécifiques
        if ($user->role->type === 'public') {
            $query->where('user_id', $user->id);
        } elseif ($user->role->type === 'prestataire') {
            // Implémenter la logique spécifique pour les prestataires
        }
    
        // Appliquer le filtre de dates
        if ($startDate) {
            $query->where('dateHeureDebut', '>=', Carbon::createFromFormat('Y-m-d', $startDate));
        }
        if ($endDate) {
            $query->where('dateHeureDebut', '<=', Carbon::createFromFormat('Y-m-d', $endDate));
        }
    
        // Filtrer par confirmation si nécessaire
        $query->where('confirm', $confirm);
    
        // Appliquer la limite pour le lazy loading
        $query->limit($limit);
    
        // Vous pouvez ajouter un orderBy ici si vous souhaitez ordonner les résultats, par exemple par date
        $query->orderBy('dateHeureDebut', 'asc');
    
        $rdvs = $query->get();
    
        return response()->json(['data' => $rdvs]);
    }
    

    public function create(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Vous devez être connecté pour créer un rendez-vous.'], 401);
        }

        $inputData = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['error' => 'Les données fournies sont mal formatées.'], 400);
        }

        // Validation des données
        $validated = $request->validate([
            'dateHeureDebut' => 'required|date',
            'dateHeureFin' => 'required|date',
            'services' => 'required|json',
            'commentaire' => 'sometimes|string',
            'notificationEnvoye' => 'required|boolean',
            'id_Voiture' => 'required|exists:voitures,id',
            'id_Statut' => 'required'
            // Ajouter d'autres champs requis ici
        ]);

        $inputData['user_id'] = $user->id;

        $newRdv = RendezVous::create($inputData);

        return response()->json(['data' => $newRdv], 201);
    }

    public function index()
    {
        $rendezvous = RendezVous::all();
        return response()->json(['data' => $rendezvous]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dateHeure' => 'required|date',
            'statut' => 'required|string|max:255',
            'id_Client' => 'required|integer',
            'id_Garagiste' => 'required|integer',
            'id_Service' => 'required|integer',
            'commentaire' => 'required|string',
            'notification' => 'required|boolean',
            'temps_estime_total' => 'required|integer',
        ]);

        $rendezvous = RendezVous::create($validatedData);
        return response()->json($rendezvous, 201);
    }

    public function show(RendezVous $rendezvous)
    {
        return response()->json($rendezvous);
    }

    public function update(Request $request, RendezVous $rendezvous)
    {
        $validatedData = $request->validate([
            'dateHeure' => 'required|date',
            'statut' => 'required|string|max:255',
            'id_Client' => 'required|integer',
            'id_Garagiste' => 'required|integer',
            'id_Service' => 'required|integer',
            'commentaire' => 'required|string',
            'notification' => 'required|boolean',
            'temps_estime_total' => 'required|integer',
        ]);
        
        $rendezvous->update($validatedData);return 
        response()->json(['data' => $rendezvous]);

    }

    public function destroy(RendezVous $rendezvous)
    {
        $rendezvous->delete();
        return response()->json(null, 204);
    }
}
