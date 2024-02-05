<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use Illuminate\Http\Request;

class EmplacementsController extends Controller
{
    public function index()
    {
        $emplacements = Emplacement::all();
        return view('emplacements.index', compact('emplacements'));
    }

    public function create()
    {
        return view('emplacements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        Emplacement::create($validated);
        return redirect()->route('emplacements.index');
    }

    public function show(Emplacement $emplacement)
    {
        return view('emplacements.show', compact('emplacement'));
    }

    public function edit(Emplacement $emplacement)
    {
        return view('emplacements.edit', compact('emplacement'));
    }

    public function update(Request $request, Emplacement $emplacement)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        $emplacement->update($validated);
        return redirect()->route('emplacements.index');
    }

    public function destroy(Emplacement $emplacement)
    {
        $emplacement->delete();
        return redirect()->route('emplacements.index');
    }
}
