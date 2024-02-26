<?php

namespace App\Http\Controllers;

use App\Models\PageGarage;
use Illuminate\Http\Request;

class PageGaragesController extends Controller
{
    public function index()
    {
        $pageGarages = PageGarage::all();
        return response()->json($pageGarages);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pageGarage = PageGarage::create($validated);
        return response()->json($pageGarage, 201);
    }

    public function show(PageGarage $pageGarage)
    {
        return response()->json($pageGarage);
    }

    public function update(Request $request, PageGarage $pageGarage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pageGarage->update($validated);
        return response()->json($pageGarage);
    }

    public function destroy(PageGarage $pageGarage)
    {
        $pageGarage->delete();
        return response()->json(null, 204);
    }
}
