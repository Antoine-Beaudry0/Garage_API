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

    public function show($id)
    {
        $pageGarage = PageGarage::findOrFail($id);
            if (isset($pageGarage->horaires)) {
                $pageGarage->horaires = json_decode($pageGarage->horaires, true);
            }


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
    
    // Trouve des rendez-vous par ID de prestataire avec des filtres de date et de confirmation
    private function findByPrestaId($prestaId, $startDate, $endDate, $confirm)
    {
        $query = RendezVous::where('prestataire_id', $prestaId);

        if ($startDate && $endDate) {
            $query->whereBetween('date', [Carbon::parse($startDate), Carbon::parse($endDate)]);
        }

        if (!is_null($confirm)) {
            $query->where('confirme', $confirm);
        }

        return $query->get();
    }

}
