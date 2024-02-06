<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceRendezVousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('serviceRendezVous')->insert([
            ['id_rdv' => 'RDV-10001', 'created_at' => now(), 'updated_at' => now()],
            ['id_rdv' => 'RDV-10002', 'created_at' => now(), 'updated_at' => now()],
            ['id_rdv' => 'RDV-10003', 'created_at' => now(), 'updated_at' => now()],
            ['id_rdv' => 'RDV-10004', 'created_at' => now(), 'updated_at' => now()],
            ['id_rdv' => 'RDV-10005', 'created_at' => now(), 'updated_at' => now()],
            // Ajoutez d'autres enregistrements selon vos besoins
        ]);
    }
}
