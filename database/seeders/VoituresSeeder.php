<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoituresSeeder extends Seeder
{
     
    public function run(): void
    {
        DB::table('voitures')->insert([
            [
                'marque' => 'Marque1',
                'modele' => 'Modele1',
                'annee' => 'Annee1',
                'code_SN' => 'Code1',
                'id_Client' => 'Client1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Marque2',
                'modele' => 'Modele2',
                'annee' => 'Annee2',
                'code_SN' => 'Code2',
                'id_Client' => 'Client2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Marque3',
                'modele' => 'Modele3',
                'annee' => 'Annee3',
                'code_SN' => 'Code3',
                'id_Client' => 'Client3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Marque4',
                'modele' => 'Modele4',
                'annee' => 'Annee4',
                'code_SN' => 'Code4',
                'id_Client' => 'Client4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Marque5',
                'modele' => 'Modele5',
                'annee' => 'Annee5',
                'code_SN' => 'Code5',
                'id_Client' => 'Client5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
