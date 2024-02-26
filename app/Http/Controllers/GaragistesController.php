<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garagiste;
use Illuminate\Support\Facades\Hash;

class GaragistesController extends Controller
{
    public function index()
    {
        $garagistes = Garagiste::all();
        return response()->json($garagistes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:garagistes',
            'password' => 'required|string|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $garagiste = Garagiste::create($validatedData);
        return response()->json($garagiste, 201);
    }

    public function show(Garagiste $garagiste)
    {
        return response()->json($garagiste);
    }

    public function update(Request $request, Garagiste $garagiste)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:garagistes,email,'.$garagiste->id,
            'password' => 'sometimes|string|min:8',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $garagiste->update($validatedData);
        return response()->json($garagiste);
    }

    public function destroy(Garagiste $garagiste)
    {
        $garagiste->delete();
        return response()->json(null, 204);
    }
}
