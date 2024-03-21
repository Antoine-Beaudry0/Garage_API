<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'annee',
        'code_SN',
        'id_client',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client', 'id');
    }
}
