<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admins = [
            ['prenom' => 'Jean', 'nom' => 'Dupont', 'email' => 'jean.dupont@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Marie', 'nom' => 'Durand', 'email' => 'marie.durand@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Luc', 'nom' => 'Martin', 'email' => 'luc.martin@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Sophie', 'nom' => 'Petit', 'email' => 'sophie.petit@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Alex', 'nom' => 'Leroy', 'email' => 'alex.leroy@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Chloé', 'nom' => 'Moreau', 'email' => 'chloe.moreau@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Thomas', 'nom' => 'Lefebvre', 'email' => 'thomas.lefebvre@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Camille', 'nom' => 'Garcia', 'email' => 'camille.garcia@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Maxime', 'nom' => 'Roux', 'email' => 'maxime.roux@example.com', 'password' => Hash::make('password')],
            ['prenom' => 'Julie', 'nom' => 'David', 'email' => 'julie.david@example.com', 'password' => Hash::make('password')],
        ];
        
        DB::table('admins')->insert($admins);
    }
}
