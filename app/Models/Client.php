<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable 
{

    use HasApiTokens, HasFactory, Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'password',
        'email'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
