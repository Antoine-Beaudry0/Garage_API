<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'data' => json_encode(['titre' => 'Rappel de rendez-vous', 'message' => 'Vous avez un rendez-vous demain à 10h.']),
                'id_client' => '1',
            ],
            [
                'data' => json_encode(['titre' => 'Promotion', 'message' => '20% de réduction sur les vidanges ce mois-ci.']),
                'id_client' => '2',
            ],
            [
                'data' => json_encode(['titre' => 'Nouveau service', 'message' => 'Nous offrons maintenant des services de peinture.']),
                'id_client' => '3',
            ],
            [
                'data' => json_encode(['titre' => 'Révision annuelle', 'message' => 'Il est temps pour votre révision annuelle. Contactez-nous pour prendre rendez-vous.']),
                'id_client' => '4',
            ],
            [
                'data' => json_encode(['titre' => 'Satisfaction client', 'message' => 'Merci de nous avoir choisi. N\'oubliez pas de laisser un avis.']),
                'id_client' => '5',
            ],
            [
                'data' => json_encode(['titre' => 'Rappel de paiement', 'message' => 'Votre dernier paiement est en retard. Veuillez régler votre facture.']),
                'id_client' => '6',
            ],
            [
                'data' => json_encode(['titre' => 'Garantie', 'message' => 'Votre garantie expire bientôt. Pensez à la renouveler.']),
                'id_client' => '7',
            ],
            [
                'data' => json_encode(['titre' => 'Mise à jour', 'message' => 'Nous avons mis à jour nos termes et conditions.']),
                'id_client' => '8',
            ],
            [
                'data' => json_encode(['titre' => 'Fermeture exceptionnelle', 'message' => 'Nous serons fermés exceptionnellement demain.']),
                'id_client' => '9',
            ],
            [
                'data' => json_encode(['titre' => 'Rendez-vous confirmé', 'message' => 'Votre rendez-vous a été confirmé pour le 15 mars à 14h.']),
                'id_client' => '10',
            ]
        ]);
    }
}
