<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $table = 'rendezVous';

    protected $fillable = [
        'dateHeureDebut',
        'dateHeureFin',
        'commentaire',
        'notificationEnvoye',
        'services',
        'id_Voiture',
        'id_PageGarage',
        'id_Statut',
    ];
    protected $attributes = [
        'services' => '[]', 
    ];
    
    public function voiture()
    {
        return $this->belongsTo(Voiture::class, 'id_Voiture', 'id');
    }
}
