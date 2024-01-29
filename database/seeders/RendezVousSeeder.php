<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RendezVousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rendezvous')->insert([
            [
                'dateHeure' => '2024-01-30 10:00:00',
                'statut' => 'En attente',
                'id_Client' => 'Client1',
                'id_Garagiste' => 'Garagiste1',
                'id_Service' => 'Service1',
                'commentaire' => 'Rendez-vous pour la réparation',
                'notification' => 'Envoyée',
                'temps_estime_total' => '2 heures',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dateHeure' => '2024-01-31 14:30:00',
                'statut' => 'Confirmé',
                'id_Client' => 'Client2',
                'id_Garagiste' => 'Garagiste2',
                'id_Service' => 'Service2',
                'commentaire' => 'Rendez-vous pour entretien',
                'notification' => 'Envoyée',
                'temps_estime_total' => '1 heure',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dateHeure' => '2024-02-01 09:15:00',
                'statut' => 'En attente',
                'id_Client' => 'Client3',
                'id_Garagiste' => 'Garagiste3',
                'id_Service' => 'Service3',
                'commentaire' => 'Rendez-vous pour le diagnostic',
                'notification' => 'Envoyée',
                'temps_estime_total' => '3 heures',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dateHeure' => '2024-02-02 11:45:00',
                'statut' => 'Annulé',
                'id_Client' => 'Client4',
                'id_Garagiste' => 'Garagiste4',
                'id_Service' => 'Service4',
                'commentaire' => 'Rendez-vous annulé par le client',
                'notification' => 'Non envoyée',
                'temps_estime_total' => 'N/A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dateHeure' => '2024-02-03 16:00:00',
                'statut' => 'En attente',
                'id_Client' => 'Client5',
                'id_Garagiste' => 'Garagiste5',
                'id_Service' => 'Service5',
                'commentaire' => 'Rendez-vous pour la réparation',
                'notification' => 'Envoyée',
                'temps_estime_total' => '4 heures',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
