<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json([
            'message' => 'Utilisateur créé avec succès',
            'user' => $user
        ], Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'message' => 'Connexion réussie',
                'user' => $user,
            ]);
        }

        return response()->json(['message' => 'Identifiants invalides'], Response::HTTP_UNAUTHORIZED);
    }

    public function update(Request $request, User $user)
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

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès']);
    }
}
