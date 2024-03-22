<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StatutsController extends Controller
{
    public function index()
    {
        $statuts = Statut::all();
        return response()->json($statuts);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255', // Modification de status_name à nom
        ]);        

        $statut = Statut::create($validated);
        return response()->json([
            'message' => 'Statut créé avec succès',
            'statut' => $statut
        ], Response::HTTP_CREATED);
    }

    public function show(Statut $statut)
    {
        return response()->json($statut);
    }

    public function update(Request $request, Statut $statut)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255', // Utilisation de nom ici
        ]);
    
        $statut->update($validated);
        return response()->json([
            'message' => 'Statut mis à jour avec succès',
            'statut' => $statut
        ]);
    }
    

    public function destroy(Statut $statut)
    {
        $statut->delete();
        return response()->json(['message' => 'Statut supprimé avec succès']);
    }
}
