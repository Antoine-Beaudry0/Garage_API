<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateHeureDebut',
        'dateHeureFin',
        'commentaire',
        'notificationEnvoyé',
        'id_voiture',
        'id_Statut',
    ];
}
