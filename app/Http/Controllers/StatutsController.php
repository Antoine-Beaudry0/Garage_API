<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Http\Request;

class StatutsController extends Controller
{
    public function index()
    {
        $statuts = Statut::all();
        return view('statuts.index', compact('statuts'));
    }

    public function create()
    {
        return view('statuts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        Statut::create($validated);
        return redirect()->route('statuts.index');
    }

    public function show(Statut $statut)
    {
        return view('statuts.show', compact('statut'));
    }

    public function edit(Statut $statut)
    {
        return view('statuts.edit', compact('statut'));
    }

    public function update(Request $request, Statut $statut)
    {
        $validated = $request->validate([
            'status_name' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        $statut->update($validated);
        return redirect()->route('statuts.index');
    }

    public function destroy(Statut $statut)
    {
        $statut->delete();
        return redirect()->route('statuts.index');
    }
}

