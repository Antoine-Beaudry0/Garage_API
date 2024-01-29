<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'nom' => 'Martin',
                'prenom' => 'Luc',
                'email' => 'luc.martin@example.com',
                'telephone' => '0123456789',
                'id_Voiture' => 1,
            ],
            [
                'nom' => 'Dupré',
                'prenom' => 'Élise',
                'email' => 'elise.dupre@example.com',
                'telephone' => '0987654321',
                'id_Voiture' => 2,
            ],
            [
                'nom' => 'Leroy',
                'prenom' => 'Jean',
                'email' => 'jean.leroy@example.com',
                'telephone' => '0234567891',
                'id_Voiture' => 3,
            ],
            [
                'Nom' => 'Moreau',
                'prenom' => 'Claire',
                'email' => 'claire.moreau@example.com',
                'telephone' => '0345678912',
                'id_Voiture' => 4,
            ],
            [
                'Nom' => 'Petit',
                'prenom' => 'Emmanuel',
                'email' => 'emmanuel.petit@example.com',
                'telephone' => '0456789123',
                'id_Voiture' => 5,
            ],
        ]);
    }
}
