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
        $pageGarages = [
            ['heuresOuverture' => '08:00', 'heuresFermetures' => '18:00', 'nom' => 'Garage Central', 'adresse' => '123 Rue de l\'Industrie, Paris', 'telephone' => '0123456789', 'image' => 'path/to/image1.jpg', 'nbEmplacement' => 10, 'id_garagiste' => 1],
            ['heuresOuverture' => '09:00', 'heuresFermetures' => '17:00', 'nom' => 'Atelier Mécanique', 'adresse' => '456 Avenue des Peupliers, Lyon', 'telephone' => '9876543210', 'image' => 'path/to/image2.jpg', 'nbEmplacement' => 8, 'id_garagiste' => 2],
            ['heuresOuverture' => '07:00', 'heuresFermetures' => '19:00', 'nom' => 'Service Rapide', 'adresse' => '789 Boulevard de la Liberté, Marseille', 'telephone' => '1122334455', 'image' => 'path/to/image3.jpg', 'nbEmplacement' => 12, 'id_garagiste' => 3],
            ['heuresOuverture' => '08:00', 'heuresFermetures' => '20:00', 'nom' => 'Garage du Centre', 'adresse' => '321 Chemin des Écoles, Toulouse', 'telephone' => '2233445566', 'image' => 'path/to/image4.jpg', 'nbEmplacement' => 15, 'id_garagiste' => 4],
            ['heuresOuverture' => '10:00', 'heuresFermetures' => '22:00', 'nom' => 'Auto Réparation', 'adresse' => '654 Rue du Commerce, Bordeaux', 'telephone' => '3344556677', 'image' => 'path/to/image5.jpg', 'nbEmplacement' => 5, 'id_garagiste' => 5],
            ['heuresOuverture' => '09:00', 'heuresFermetures' => '18:00', 'nom' => 'Garage Express', 'adresse' => '987 Allée des Ormes, Nantes', 'telephone' => '4455667788', 'image' => 'path/to/image6.jpg', 'nbEmplacement' => 7, 'id_garagiste' => 6],
            ['heuresOuverture' => '08:00', 'heuresFermetures' => '18:00', 'nom' => 'Le Garage Bleu', 'adresse' => '369 Route de la Mer, Nice', 'telephone' => '5566778899', 'image' => 'path/to/image7.jpg', 'nbEmplacement' => 9, 'id_garagiste' => 7],
            ['heuresOuverture' => '07:00', 'heuresFermetures' => '17:00', 'nom' => 'Réparations Premium', 'adresse' => '852 Rue du Lac, Strasbourg', 'telephone' => '6677889900', 'image' => 'path/to/image8.jpg', 'nbEmplacement' => 11, 'id_garagiste' => 8],
            ['heuresOuverture' => '06:00', 'heuresFermetures' => '16:00', 'nom' => 'Garage de l\'Avenir', 'adresse' => '147 Avenue des Fleurs, Lille', 'telephone' => '7788990011', 'image' => 'path/to/image9.jpg', 'nbEmplacement' => 6, 'id_garagiste' => 9],
            ['heuresOuverture' => '08:30', 'heuresFermetures' => '19:30', 'nom' => 'Service Auto Plus', 'adresse' => '258 Place de l\'Étoile, Montpellier', 'telephone' => '8899001122', 'image' => 'path/to/image10.jpg', 'nbEmplacement' => 8, 'id_garagiste' => 10],
        ];
        DB::table('page_garages')->insert($pageGarages);
    }
}
