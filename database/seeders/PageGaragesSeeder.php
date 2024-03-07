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
                'image' => null,
                'id_garagiste' => 1,
                'nbEmplacement' => 5,
                'horaires' => json_encode([]),
            ],
        ];
        DB::table('page_garages')->insert($garages);
    }
}
