<?php

namespace App\Http\Controllers;

use App\Models\ServiceRendezVous;
use Illuminate\Http\Request;

class ServiceRendezVousController extends Controller
{
    public function index()
    {
        $serviceRendezVous = ServiceRendezVous::all();
        return response()->json($serviceRendezVous);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        $serviceRendezVous = ServiceRendezVous::create($validated);
        return response()->json($serviceRendezVous, 201);
    }

    public function show(ServiceRendezVous $serviceRendezVous)
    {
        return response()->json($serviceRendezVous);
    }

    public function update(Request $request, ServiceRendezVous $serviceRendezVous)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
        ]);

        $serviceRendezVous->update($validated);
        return response()->json($serviceRendezVous);
    }

    public function destroy(ServiceRendezVous $serviceRendezVous)
    {
        $serviceRendezVous->delete();
        return response()->json(null, 204);
    }
}
