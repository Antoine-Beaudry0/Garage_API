<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RendezVousSeeder extends Seeder
{
    public function run()
    {
        DB::table('rendezvous')->insert([
            [
                'dateHeureDebut' => '2024-01-30 10:00:00',
                'dateHeureFin' => '2024-01-30 12:00:00',
                'commentaire' => 'Rendez-vous pour la révision annuelle',
                'notificationEnvoyé' => true,
                'id_Client' => '1',
                'id_Garagiste' => '1',
                'id_Service' => '1',
                'id_Statut' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'dateHeureDebut' => '2024-02-05 14:00:00',
                'dateHeureFin' => '2024-02-05 15:00:00',
                'commentaire' => 'Diagnostic moteur',
                'notificationEnvoyé' => true,
                'id_Client' => '2',
                'id_Garagiste' => '2',
                'id_Service' => '2',
                'id_Statut' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'dateHeureDebut' => '2024-02-10 09:00:00',
                'dateHeureFin' => '2024-02-10 11:00:00',
                'commentaire' => 'Changement des pneus',
                'notificationEnvoyé' => false,
                'id_Client' => '3',
                'id_Garagiste' => '1',
                'id_Service' => '3',
                'id_Statut' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Ajoutez plus d'entrées selon le besoin
        
        ]);
    }
}
