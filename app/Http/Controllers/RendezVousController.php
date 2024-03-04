<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RendezVousController extends Controller
{
    // Récupérer tous les rendez-vous, avec la possibilité de filtres par utilisateur ou prestataire
    public function index(Request $request)
    {
        $query = RendezVous::query();

        // Filtres optionnels par date et confirmation
        if ($startDate = $request->query('startDate')) {
            $query->where('date', '>=', Carbon::parse($startDate));
        }
        if ($endDate = $request->query('endDate')) {
            $query->where('date', '<=', Carbon::parse($endDate));
        }
        if ($request->has('confirm')) {
            $query->where('confirme', $request->query('confirm') === 'true');
        }

        // Filtrage par rôle d'utilisateur (si nécessaire)
        $user = Auth::user();
        if ($user && $user->role->type === 'prestataire') {
            $query->where('prestataire_id', $user->id);
        } elseif ($user) {
            $query->where('user_id', $user->id);
        }

        $rendezvous = $query->get();
        return response()->json(['data' => $rendezvous]);
    }

    // Créer un nouveau rendez-vous
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'datefin' => 'required|date',
            'confirme' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
            'prestataire_id' => 'required|exists:users,id',
            // Ajoutez d'autres champs requis ici
        ]);

        $rendezvous = RendezVous::create($validatedData);
        return response()->json(['data' => $rendezvous], 201);
    }

    // Afficher un rendez-vous spécifique
    public function show($id)
    {
        $rendezvous = RendezVous::findOrFail($id);
        return response()->json(['data' => $rendezvous]);
    }

    // Mettre à jour un rendez-vous
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'sometimes|required|date',
            'datefin' => 'sometimes|required|date',
            'confirme' => 'sometimes|required|boolean',
            // Ajoutez d'autres champs requis pour la mise à jour ici
        ]);

        $rendezvous = RendezVous::findOrFail($id);
        $rendezvous->update($validatedData);
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
}
