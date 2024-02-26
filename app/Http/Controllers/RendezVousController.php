<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;

class RendezVousController extends Controller
{
    public function index()
    {
        $rendezvous = RendezVous::all();
        return response()->json($rendezvous);
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
        
        $rendezvous->update($validatedData);
        return response()->json($rendezvous);
    }

    public function destroy(RendezVous $rendezvous)
    {
        $rendezvous->delete();
        return response()->json(null, 204);
    }
}
