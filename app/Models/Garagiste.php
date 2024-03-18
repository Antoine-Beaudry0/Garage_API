<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject; // Assurez-vous d'importer JWTSubject
use Illuminate\Foundation\Auth\User as Authenticatable; // Pour l'authentification

class Garagiste extends Authenticatable implements JWTSubject
{
    use HasFactory;
    
    protected $fillable = [
        'prenom', 'nom', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey(); // Returns the primary key ('id' by default)
    }

    public function getJWTCustomClaims()
    {
        return [
            'role' => 'garagiste' // Example of adding a role claim
        ];
    }
}