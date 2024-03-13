<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function index()
    {
        $users = Client::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = Client::create([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'user' => $user
        ], Response::HTTP_CREATED);
    }

    public function show(Client $user)
    {
        return response()->json($user);
    }

    public function login(Request $request)
    {
       
      // Valider les données du formulaire de connexion
      $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Tenter de connecter l'utilisateur
    if (Auth::attempt($credentials)) {
        // Authentification réussie, récupérer l'utilisateur
        $user = Auth::user();

        // Générer le jeton d'API
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        // Retourner les informations de l'utilisateur et le jeton d'API dans la réponse JSON
        return response()->json([
            'user' => [
                'id' => $user->id,
                'prenom' => $user->prenom,
                'nom' => $user->nom,
                'telephone' => $user->telephone,
                'email' => $user->email,
            ],
            'token' => $token
        ]);
    }

    // Authentification échouée, retourner une réponse d'erreur avec un message personnalisé
    return response()->json(['error' => 'Unauthorized', 'message' => 'Email or password incorrect'], 401);
 
    }

    public function update(Request $request, Client $user)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);

        return response()->json([
            'message' => 'Utilisateur mis à jour avec succès',
            'user' => $user,
        ]);
    }

    public function destroy(Client $user)
    {
        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
