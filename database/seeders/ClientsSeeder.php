<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'id_Usager' => 'usager1',
                'id_Voiture' => 'voiture1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_Usager' => 'usager2',
                'id_Voiture' => 'voiture2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_Usager' => 'usager3',
                'id_Voiture' => 'voiture3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez plus d'entrées selon vos besoins
        ]);
    }
}
