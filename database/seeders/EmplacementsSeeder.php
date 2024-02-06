<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmplacementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emplacements')->insert([
            ['id_page' => 'page1', 'created_at' => now(), 'updated_at' => now()],
            ['id_page' => 'page2', 'created_at' => now(), 'updated_at' => now()],
            ['id_page' => 'page3', 'created_at' => now(), 'updated_at' => now()],
            ['id_page' => 'page4', 'created_at' => now(), 'updated_at' => now()],
            // Ajoutez plus d'entrées selon vos besoins
        ]);
    }
}
