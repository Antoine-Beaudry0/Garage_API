<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateHeure',
        'statut',
        'id_Client',
        'id_Garagiste',
        'id_Service',
        'commentaire',
        'notificationEnvoyee',
        'temps_estime_total',
    ];
}
