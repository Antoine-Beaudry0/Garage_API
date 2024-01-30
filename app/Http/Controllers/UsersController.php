<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Assurez-vous que le modèle User correspond à votre table users
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Créez un nouvel utilisateur
        User::create([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            // Ajoutez d'autres champs si nécessaire
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function loginForm()
{
    return view('auth.login'); // Créez la vue auth.login avec le formulaire de connexion
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentification réussie
        return redirect()->intended('dashboard'); // Redirigez vers la page souhaitée après la connexion
    }

    return back()->withErrors(['email' => 'Identifiants invalides'])->withInput();
}

    public function update(Request $request, User $user)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Mettez à jour l'utilisateur
        $user->update([
            'nom' => $validatedData['nom'],
            'email' => $validatedData['email'],
            // Ajoutez d'autres champs si nécessaire
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}

