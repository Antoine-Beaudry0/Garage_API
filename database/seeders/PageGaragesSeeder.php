<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageGaragesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $garages = [
            [
                'nom' => 'Garage Central',
                'adresse' => '123 Rue Principale',
                'telephone' => '0123456789',
                'image' => null, // ou spécifiez un chemin d'image
                'id_garagiste' => 1, // Assurez-vous que cet ID existe dans votre table users ou garagistes
                'nbEmplacement' => 5,
                'horaires' => json_encode([]),
            ],
            // Ajoutez autant de garages que vous le souhaitez ici
        ];
    }
}
