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
    public function run()
    {
        $statuts = [
            ['nom' => 'Confirmé'],
            ['nom' => 'Non confirmé'],
            ['nom' => 'En cours'],
            ['nom' => 'Terminé'],
        ];
        DB::table('statuts')->insert($statuts);
    }
}
