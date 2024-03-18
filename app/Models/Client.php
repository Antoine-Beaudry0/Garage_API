<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Client extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $fillable = [
    'prenom',
    'nom',
    'email',
    'password',
    'telephone',
    'adresse'
    ];
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'telephone' => 'string'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey(); // Returns the primary key ('id' by default)
    }
    public function getJWTCustomClaims()
    {
        return [
            'role' => 'client' // Example of adding a role claim
        ];
    }
    
}
