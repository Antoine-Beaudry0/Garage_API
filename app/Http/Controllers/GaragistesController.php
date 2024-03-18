<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garagiste;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;


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
    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);      
        try {
            if (!$token = Auth::guard('garagiste')->attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
        $user = Auth::guard('garagiste')->user();

        $userData = [
            'id' => $user->id,
            'name' => $user->nom,
            'prenom' => $user->prenom,
            'email' => $user->email
        ];

        // If successful, return the JWT token with other relevant user data
        return response()->json([
            'token' => $token,
            'user' => $userData
        ]);
    }
}
