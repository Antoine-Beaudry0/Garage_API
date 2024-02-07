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
            ['marque' => 'Toyota', 'modele' => 'Corolla', 'annee' => 2020, 'code_SN' => 'SN001', 'id_client' => 1],
            ['marque' => 'Honda', 'modele' => 'Civic', 'annee' => 2019, 'code_SN' => 'SN002', 'id_client' => 2],
            ['marque' => 'Ford', 'modele' => 'Fiesta', 'annee' => 2018, 'code_SN' => 'SN003', 'id_client' => 3],
            ['marque' => 'Peugeot', 'modele' => '208', 'annee' => 2020, 'code_SN' => 'SN004', 'id_client' => 4],
            ['marque' => 'Renault', 'modele' => 'Clio', 'annee' => 2019, 'code_SN' => 'SN005', 'id_client' => 5],
            ['marque' => 'Volkswagen', 'modele' => 'Golf', 'annee' => 2018, 'code_SN' => 'SN006', 'id_client' => 6],
            ['marque' => 'BMW', 'modele' => 'Series 3', 'annee' => 2020, 'code_SN' => 'SN007', 'id_client' => 7],
            ['marque' => 'Audi', 'modele' => 'A4', 'annee' => 2019, 'code_SN' => 'SN008', 'id_client' => 8],
            ['marque' => 'Mercedes-Benz', 'modele' => 'Class C', 'annee' => 2018, 'code_SN' => 'SN009', 'id_client' => 9],
            ['marque' => 'Tesla', 'modele' => 'Model 3', 'annee' => 2020, 'code_SN' => 'SN010', 'id_client' => 10],
        ];

        DB::table('voitures')->insert($voitures);
    }
}
