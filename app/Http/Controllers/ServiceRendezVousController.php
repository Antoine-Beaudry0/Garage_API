<?php

namespace App\Http\Controllers;

use App\Models\ServiceRendezVous;
use Illuminate\Http\Request;

class ServiceRendezVousController extends Controller
{
    public function index()
    {
        $serviceRendezVous = ServiceRendezVous::all();
        return view('serviceRendezVous.index', compact('serviceRendezVous'));
    }

    public function create()
    {
        return view('serviceRendezVous.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        ServiceRendezVous::create($validated);
        return redirect()->route('serviceRendezVous.index');
    }

    public function show(ServiceRendezVous $serviceRendezVous)
    {
        return view('serviceRendezVous.show', compact('serviceRendezVous'));
    }

    public function edit(ServiceRendezVous $serviceRendezVous)
    {
        return view('serviceRendezVous.edit', compact('serviceRendezVous'));
    }

    public function update(Request $request, ServiceRendezVous $serviceRendezVous)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            // Add other fields as necessary
        ]);

        $serviceRendezVous->update($validated);
        return redirect()->route('serviceRendezVous.index');
    }

    public function destroy(ServiceRendezVous $serviceRendezVous)
    {
        $serviceRendezVous->delete();
        return redirect()->route('serviceRendezVous.index');
    }
}
