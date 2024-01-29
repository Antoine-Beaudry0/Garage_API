<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaragesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('garages')->insert([
            [
                'nom' => 'Garage Dupont',
                'email' => 'contact@garagedupont.com',
                'telephone' => '0123456789',
                'horaires_ouverture' => '08:00-17:00',
                'nb_personne' => 5,
            ],
            [
                'nom' => 'Garage Bonnet',
                'email' => 'info@garagebonnet.com',
                'telephone' => '0987654321',
                'horaires_ouverture' => '09:00-18:00',
                'nb_personne' => 7,
            ],
            [
                'nom' => 'Atelier Mécanique',
                'email' => 'atelier@mechanicwork.com',
                'telephone' => '0234567891',
                'horaires_ouverture' => '07:30-16:30',
                'nb_personne' => 4,
            ],
            [
                'nom' => 'Garage Central',
                'email' => 'central@garageservice.com',
                'telephone' => '0345678912',
                'horaires_ouverture' => '10:00-19:00',
                'nb_personne' => 6,
            ],
            [
                'nom' => 'Service Auto Rapide',
                'email' => 'rapid@autoservice.com',
                'telephone' => '0456789123',
                'horaires_ouverture' => '08:00-17:00',
                'nb_personne' => 8,
            ],
        ]);
    }
}
