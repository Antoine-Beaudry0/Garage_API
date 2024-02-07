<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceRendezVousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('service_rendez_vous')->insert([
            ['id_service' => '1', 'id_rdv' => '1'],
            ['id_service' => '2', 'id_rdv' => '2'],
            ['id_service' => '3', 'id_rdv' => '3'],
            ['id_service' => '4', 'id_rdv' => '4'],
            ['id_service' => '5', 'id_rdv' => '5'],
            ['id_service' => '6', 'id_rdv' => '6'],
            ['id_service' => '7', 'id_rdv' => '7'],
            ['id_service' => '8', 'id_rdv' => '8'],
            ['id_service' => '9', 'id_rdv' => '9'],
            ['id_service' => '10', 'id_rdv' => '10'],
        ]);
    }
}
