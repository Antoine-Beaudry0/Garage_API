<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use Illuminate\Http\Response;

class VoituresController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        return response()->json($voitures);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
            'code_SN' => 'required',
            'id_Client' => 'required',
        ]);

        $voiture = Voiture::create($validatedData);

        return response()->json([
            'message' => 'Voiture créée avec succès',
            'voiture' => $voiture
        ], Response::HTTP_CREATED); // 201
    }

    public function show(Voiture $voiture)
    {
        return response()->json($voiture);
    }

    public function update(Request $request, Voiture $voiture)
    {
        $validatedData = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
            'code_SN' => 'required',
            'id_Client' => 'required',
        ]);

        $voiture->update($validatedData);

        return response()->json([
            'message' => 'Voiture mise à jour avec succès',
            'voiture' => $voiture
        ]);
    }

    public function destroy(Voiture $voiture)
    {
        $voiture->delete();

        return response()->json(['message' => 'Voiture supprimée avec succès']);
    }
}
