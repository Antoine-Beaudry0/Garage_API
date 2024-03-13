<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Example - Relationship with Orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
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
