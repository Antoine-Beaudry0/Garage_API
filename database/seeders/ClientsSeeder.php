<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clients = [
            ['prenom' => 'Alexandre', 'nom' => 'Bernard', 'email' => 'alexandre.bernard@example.com', 'password' => Hash::make('password'), 'telephone' => '0123456789', 'adresse' => '123 Rue de Paris, Paris'],
            ['prenom' => 'Béatrice', 'nom' => 'Dubois', 'email' => 'beatrice.dubois@example.com', 'password' => Hash::make('password'), 'telephone' => '9876543210', 'adresse' => '456 Avenue de France, Lyon'],
            ['prenom' => 'Charles', 'nom' => 'Lambert', 'email' => 'charles.lambert@example.com', 'password' => Hash::make('password'), 'telephone' => '1122334455', 'adresse' => '789 Boulevard de l\'Indépendance, Marseille'],
            ['prenom' => 'Diane', 'nom' => 'Roux', 'email' => 'diane.roux@example.com', 'password' => Hash::make('password'), 'telephone' => '2233445566', 'adresse' => '321 Route de Genève, Lyon'],
            ['prenom' => 'Émile', 'nom' => 'Moreau', 'email' => 'emile.moreau@example.com', 'password' => Hash::make('password'), 'telephone' => '3344556677', 'adresse' => '654 Chemin des Écoliers, Toulouse'],
            ['prenom' => 'Fanny', 'nom' => 'Petit', 'email' => 'fanny.petit@example.com', 'password' => Hash::make('password'), 'telephone' => '4455667788', 'adresse' => '987 Rue du Bac, Bordeaux'],
            ['prenom' => 'Gérard', 'nom' => 'Brun', 'email' => 'gerard.brun@example.com', 'password' => Hash::make('password'), 'telephone' => '5566778899', 'adresse' => '369 Allée du Roy, Nantes'],
            ['prenom' => 'Hélène', 'nom' => 'Vincent', 'email' => 'helene.vincent@example.com', 'password' => Hash::make('password'), 'telephone' => '6677889900', 'adresse' => '852 Cour des Miracles, Strasbourg'],
            ['prenom' => 'Igor', 'nom' => 'Dupont', 'email' => 'igor.dupont@example.com', 'password' => Hash::make('password'), 'telephone' => '7788990011', 'adresse' => '147 Voie de la Liberté, Lille'],
            ['prenom' => 'Juliette', 'nom' => 'Lefevre', 'email' => 'juliette.lefevre@example.com', 'password' => Hash::make('password'), 'telephone' => '8899001122', 'adresse' => '258 Place de la Victoire, Nice'],
        ];
        
        DB::table('clients')->insert($clients);
    }
}
