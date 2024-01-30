<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;

class RendezVousController extends Controller
{
    public function index()
    {
        $rendezvous = RendezVous::all();
        return view('rendezvous.index', compact('rendezvous'));
    }

    public function create()
    {
        return view('rendezvous.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dateHeure' => 'required',
            'statut' => 'required',
            'id_Client' => 'required',
            'id_Garagiste' => 'required',
            'id_Service' => 'required',
            'commentaire' => 'required',
            'notification' => 'required',
            'temps_estime_total' => 'required',
        ]);

        RendezVous::create($validatedData);

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous créé avec succès');
    }

    public function show(RendezVous $rendezvous)
    {
        return view('rendezvous.show', compact('rendezvous'));
    }

    public function edit(RendezVous $rendezvous)
    {
        return view('rendezvous.edit', compact('rendezvous'));
    }

    public function update(Request $request, RendezVous $rendezvous)
    {
        $validatedData = $request->validate([
            'dateHeure' => 'required',
            'statut' => 'required',
            'id_Client' => 'required',
            'id_Garagiste' => 'required',
            'id_Service' => 'required',
            'commentaire' => 'required',
            'notification' => 'required',
            'temps_estime_total' => 'required',
        ]);
        
        $rendezvous->update($validatedData);

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous mis à jour avec succès');
    }

    public function destroy(RendezVous $rendezvous)
    {
        $rendezvous->delete();

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous supprimé avec succès');
    }
}

