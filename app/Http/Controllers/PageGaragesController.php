<?php

namespace App\Http\Controllers;

use App\Models\PageGarage;
use Illuminate\Http\Request;

class PageGaragesController extends Controller
{
    public function index()
    {
        $pageGarages = PageGarage::all();
        return view('pageGarages.index', compact('pageGarages'));
    }

    public function create()
    {
        return view('pageGarages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        PageGarage::create($validated);
        return redirect()->route('pageGarages.index');
    }

    public function show(PageGarage $pageGarage)
    {
        return view('pageGarages.show', compact('pageGarage'));
    }

    public function edit(PageGarage $pageGarage)
    {
        return view('pageGarages.edit', compact('pageGarage'));
    }

    public function update(Request $request, PageGarage $pageGarage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        $pageGarage->update($validated);
        return redirect()->route('pageGarages.index');
    }

    public function destroy(PageGarage $pageGarage)
    {
        $pageGarage->delete();
        return redirect()->route('pageGarages.index');
    }
}
