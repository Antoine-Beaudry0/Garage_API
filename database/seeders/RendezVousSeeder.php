<?php

namespace Database\Seeders;use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RendezVousSeeder extends Seeder
{
    public function run()
    {
        DB::table('rendezVous')->insert([
            [
                'dateHeureDebut' => '2024-01-10 09:00:00',
                'dateHeureFin' => '2024-01-10 11:00:00',
                'commentaire' => 'Contrôle technique',
                'notificationEnvoyé' => true,
                'id_Client' => '1',
                'id_Garagiste' => '1',
                'id_Service' => '1',
                'id_Statut' => '1',
            ],
            [
                'dateHeureDebut' => '2024-02-15 10:00:00',
                'dateHeureFin' => '2024-02-15 12:00:00',
                'commentaire' => 'Révision moteur',
                'notificationEnvoyé' => false,
                'id_Client' => '2',
                'id_Garagiste' => '2',
                'id_Service' => '2',
                'id_Statut' => '2',
            ],
            [
                'dateHeureDebut' => '2024-03-20 14:00:00',
                'dateHeureFin' => '2024-03-20 16:00:00',
                'commentaire' => 'Changement de pneus',
                'notificationEnvoyé' => true,
                'id_Client' => '3',
                'id_Garagiste' => '1',
                'id_Service' => '3',
                'id_Statut' => '3',
            ],
            [
                'dateHeureDebut' => '2024-04-25 09:00:00',
                'dateHeureFin' => '2024-04-25 11:00:00',
                'commentaire' => 'Peinture carrosserie',
                'notificationEnvoyé' => false,
                'id_Client' => '4',
                'id_Garagiste' => '2',
                'id_Service' => '4',
                'id_Statut' => '4',
            ],
            [
                'dateHeureDebut' => '2024-05-30 13:00:00',
                'dateHeureFin' => '2024-05-30 15:00:00',
                'commentaire' => 'Vérification freins',
                'notificationEnvoyé' => true,
                'id_Client' => '5',
                'id_Garagiste' => '1',
                'id_Service' => '5',
                'id_Statut' => '1',
            ],
            [
                'dateHeureDebut' => '2024-06-04 08:00:00',
                'dateHeureFin' => '2024-06-04 10:00:00',
                'commentaire' => 'Réglage des phares',
                'notificationEnvoyé' => false,
                'id_Client' => '6',
                'id_Garagiste' => '2',
                'id_Service' => '6',
                'id_Statut' => '2',
            ],
            [
                'dateHeureDebut' => '2024-07-09 11:00:00',
                'dateHeureFin' => '2024-07-09 13:00:00',
                'commentaire' => 'Installation système GPS',
                'notificationEnvoyé' => true,
                'id_Client' => '7',
                'id_Garagiste' => '1',
                'id_Service' => '7',
                'id_Statut' => '3',
            ],
            [
                'dateHeureDebut' => '2024-08-14 15:00:00',
                'dateHeureFin' => '2024-08-14 17:00:00',
                'commentaire' => 'Entretien climatisation',
                'notificationEnvoyé' => false,
                'id_Client' => '8',
                'id_Garagiste' => '2',
                'id_Service' => '8',
                'id_Statut' => '4',
            ],
            [
                'dateHeureDebut' => '2024-09-19 09:30:00',
                'dateHeureFin' => '2024-09-19 11:30:00',
                'commentaire' => 'Réparation système audio',
                'notificationEnvoyé' => true,
                'id_Client' => '9',
                'id_Garagiste' => '1',
                'id_Service' => '9',
                'id_Statut' => '1',
            ],
            [
                'dateHeureDebut' => '2024-10-24 14:00:00',
                'dateHeureFin' => '2024-10-24 16:00:00',
                'commentaire' => 'Remplacement batterie',
                'notificationEnvoyé' => false,
                'id_Client' => '10',
                'id_Garagiste' => '2',
                'id_Service' => '10',
                'id_Statut' => '2',
            ]
        ]);
    }
}
