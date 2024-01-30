<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nom' => 'Utilisateur 1',
                'email' => 'utilisateur1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1'),
                'telephone' => '1234567890',
                'horaires_ouverture' => '9:00 AM - 5:00 PM',
                'nb_personne' => '2',
                'id_Voiture' => '1',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Utilisateur 2',
                'email' => 'utilisateur2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password2'),
                'telephone' => '9876543210',
                'horaires_ouverture' => '8:00 AM - 4:00 PM',
                'nb_personne' => '3',
                'id_Voiture' => '2',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Utilisateur 3',
                'email' => 'utilisateur3@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password3'),
                'telephone' => '5555555555',
                'horaires_ouverture' => '10:00 AM - 6:00 PM',
                'nb_personne' => '1',
                'id_Voiture' => '3',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Utilisateur 4',
                'email' => 'utilisateur4@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password4'),
                'telephone' => '1231231234',
                'horaires_ouverture' => '7:00 AM - 3:00 PM',
                'nb_personne' => '4',
                'id_Voiture' => '4',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Utilisateur 5',
                'email' => 'utilisateur5@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password5'),
                'telephone' => '9999999999',
                'horaires_ouverture' => '9:00 AM - 5:00 PM',
                'nb_personne' => '2',
                'id_Voiture' => '5',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    
    }
}
