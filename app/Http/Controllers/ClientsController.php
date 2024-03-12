<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return response()->json(['data' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:8',
            // Ajoutez ici les validations pour d'autres champs requis
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); // Hasher le mot de passe

        $client = Client::create($validatedData);

        return response()->json(['message' => 'Client créé avec succès', 'data' => $client], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return response()->json(['data' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:clients,email,' . $id,
            'password' => 'sometimes|required|string|min:8',
            // Ajoutez ici les validations pour d'autres champs que vous souhaitez mettre à jour
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $client->update($validatedData);

        return response()->json(['message' => 'Client mis à jour avec succès', 'data' => $client]);
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['message' => 'Client supprimé avec succès']);
    }
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            // Attempt to authenticate the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        $user = Auth::user();

        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'prenom' => $user->prenom,
            'email' => $user->email
        ];

        // If successful, return the JWT token with other relevant user data
        return response()->json([
          
            'message'=>"test",
           // 'user' => Auth::user() 
           'user' => $userData

        ]);
    }
}
