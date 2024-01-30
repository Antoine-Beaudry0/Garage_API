<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exemple; // Assurez-vous que le modèle Exemple correspond à votre table

class ExempleController extends Controller
{
    public function index()
    {
        $exemples = Exemple::all();
        return view('exemples.index', compact('exemples'));
    }

    public function create()
    {
        return view('exemples.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'data' => 'required|json',
        ]);

        // Créez un nouvel exemple
        Exemple::create($validatedData);

        return redirect()->route('exemples.index')->with('success', 'Exemple créé avec succès');
    }

    public function show(Exemple $exemple)
    {
        return view('exemples.show', compact('exemple'));
    }

    public function edit(Exemple $exemple)
    {
        return view('exemples.edit', compact('exemple'));
    }

    public function update(Request $request, Exemple $exemple)
    {
        // Validation des données
        $validatedData = $request->validate([
            'data' => 'required|json',
        ]);

        // Mettez à jour l'exemple
        $exemple->update($validatedData);

        return redirect()->route('exemples.index')->with('success', 'Exemple mis à jour avec succès');
    }

    public function destroy(Exemple $exemple)
    {
        $exemple->delete();

        return redirect()->route('exemples.index')->with('success', 'Exemple supprimé avec succès');
    }
}

