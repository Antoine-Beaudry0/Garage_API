<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaragistesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $garagistes = [
            ['prenom' => 'Louis', 'nom' => 'Martin', 'email' => 'louis.martin@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Alice', 'nom' => 'Dubois', 'email' => 'alice.dubois@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Jules', 'nom' => 'Leroy', 'email' => 'jules.leroy@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Emma', 'nom' => 'Moreau', 'email' => 'emma.moreau@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Hugo', 'nom' => 'Petit', 'email' => 'hugo.petit@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Ines', 'nom' => 'Roux', 'email' => 'ines.roux@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Lucas', 'nom' => 'David', 'email' => 'lucas.david@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Chloé', 'nom' => 'Bernard', 'email' => 'chloe.bernard@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Nathan', 'nom' => 'Richard', 'email' => 'nathan.richard@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Zoé', 'nom' => 'Dupont', 'email' => 'zoe.dupont@example.com', 'password' => Hash::make('password')],
        ];

        DB::table('garagistes')->insert($garagistes);
    }
}
