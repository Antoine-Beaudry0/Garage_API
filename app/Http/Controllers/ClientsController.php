<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;


class ClientsController extends Controller
{

    /**√
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
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:8',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
        ]);
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        // Ajout pour déboguer les données validées
        \Log::debug('validatedData', $validatedData);
    
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
            if (!$token = Auth::guard('client')->attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        $user = Auth::guard('client')->user();
        // Pré-charge les voitures liées au client
        $user->load('voitures');

        $userData = [
            'id' => $user->id,
            'name' => $user->nom,
            'prenom' => $user->prenom,
            'email' => $user->email,
            'voitures' => $user->voitures->map(function ($voiture) {
                return [
                    'id' => $voiture->id,
                    'marque' => $voiture->marque,
                    'modele' => $voiture->modele,
                    'annee' => $voiture->annee,
                    'code_SN' => $voiture->code_SN,
                ];
            }),
        ];

        // If successful, return the JWT token with other relevant user data
        return response()->json([
            'token' => $token,
            'user' => $userData
        ]);
    }

    

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            //infos clients
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:8|confirmed', // Add confirmation rule
            'telephone' => 'required|string', 
            'adresse' => 'required|string',
            
            //infos voiture
            'marque' => 'required|string',
            'modele' => 'required|string',
            'annee' => 'required|integer',
        ]);

        DB::transaction(function () use ($validatedData, $request) {
            $client = Client::create($request->only([
                'prenom', 'nom', 'email', 'password', 'telephone', 'adresse'
            ]));
    
            $client->password = Hash::make($client->password); 
            $client->save();
    
            $client->voiture()->create($request->only([
                'marque', 'modele', 'annee' 
            ]));
        });
    
        // Token Generation & Response
        if ($token = JWTAuth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Client créé avec succès',
                'token' => $token,
                'user' => $client
            ], 201);
        }
    
        return response()->json([
            'message' => 'Client créé avec succès',
            'user' => $client
        ], 201); 
    }
}
