<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use Illuminate\Http\Request;

class EmplacementsController extends Controller
{
    public function index()
    {
        $emplacements = Emplacement::all();
        return response()->json($emplacements);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $emplacement = Emplacement::create($validated);
        return response()->json($emplacement, 201);
    }

    public function show(Emplacement $emplacement)
    {
        return response()->json($emplacement);
    }

    public function update(Request $request, Emplacement $emplacement)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $emplacement->update($validated);
        return response()->json($emplacement);
    }

    public function destroy(Emplacement $emplacement)
    {
        $emplacement->delete();
        return response()->json(null, 204);
    }
}
