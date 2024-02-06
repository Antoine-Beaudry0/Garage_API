<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuts')->insert([
            ['nom' => 'Actif', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Inactif', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'En attente', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Supprimé', 'created_at' => now(), 'updated_at' => now()],
            // Ajoutez d'autres statuts selon vos besoins
        ]);
    }
}
