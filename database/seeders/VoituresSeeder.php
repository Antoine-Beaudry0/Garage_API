<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoituresSeeder extends Seeder
{
    public function run()
    {
        $voitures = [
            ['marque' => 'Toyota', 'modele' => 'Corolla', 'annee' => '2015', 'code_SN' => 'SN001', 'id_Client' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Honda', 'modele' => 'Civic', 'annee' => '2016', 'code_SN' => 'SN002', 'id_Client' => '2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Ford', 'modele' => 'Focus', 'annee' => '2017', 'code_SN' => 'SN003', 'id_Client' => '3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Chevrolet', 'modele' => 'Cruze', 'annee' => '2018', 'code_SN' => 'SN004', 'id_Client' => '4', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Hyundai', 'modele' => 'Elantra', 'annee' => '2019', 'code_SN' => 'SN005', 'id_Client' => '5', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Nissan', 'modele' => 'Sentra', 'annee' => '2020', 'code_SN' => 'SN006', 'id_Client' => '6', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Volkswagen', 'modele' => 'Jetta', 'annee' => '2021', 'code_SN' => 'SN007', 'id_Client' => '7', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Subaru', 'modele' => 'Impreza', 'annee' => '2022', 'code_SN' => 'SN008', 'id_Client' => '8', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'Mazda', 'modele' => '3', 'annee' => '2023', 'code_SN' => 'SN009', 'id_Client' => '9', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['marque' => 'BMW', 'modele' => '320i', 'annee' => '2024', 'code_SN' => 'SN010', 'id_Client' => '10', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('voitures')->insert($voitures);
    }
}
