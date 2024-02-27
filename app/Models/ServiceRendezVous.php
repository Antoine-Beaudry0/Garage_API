<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRendezVous extends Model
{
    protected $table = 'service_rendez_vous';

    use HasFactory;
    protected $fillable = [
        'id_service', 
        'id_rdv'
    ];
}
