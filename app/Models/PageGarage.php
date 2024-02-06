<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageGarage extends Model
{
    use HasFactory;
    protected $fillable = ['heuresOuverture', 'heuresFermetures', 'id_usager'];

}
