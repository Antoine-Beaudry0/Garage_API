<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture; // Assurez-vous que le modèle Voiture correspond à votre table

class VoituresController extends Controller
{
    public function index()
    {
        $voitures = Voiture::all();
        return view('voitures.index', compact('voitures'));
    }

    public function create()
    {
        return view('voitures.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
            'code_SN' => 'required',
            'id_Client' => 'required',
        ]);

        // Créez une nouvelle voiture
        Voiture::create($validatedData);

        return redirect()->route('voitures.index')->with('success', 'Voiture créée avec succès');
    }

    public function show(Voiture $voiture)
    {
        return view('voitures.show', compact('voiture'));
    }

    public function edit(Voiture $voiture)
    {
        return view('voitures.edit', compact('voiture'));
    }

    public function update(Request $request, Voiture $voiture)
    {
        // Validation des données
        $validatedData = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
            'code_SN' => 'required',
            'id_Client' => 'required',
        ]);

        // Mettez à jour la voiture
        $voiture->update($validatedData);

        return redirect()->route('voitures.index')->with('success', 'Voiture mise à jour avec succès');
    }

    public function destroy(Voiture $voiture)
    {
        $voiture->delete();

        return redirect()->route('voitures.index')->with('success', 'Voiture supprimée avec succès');
    }
}

