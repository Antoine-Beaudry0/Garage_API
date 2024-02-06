<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'nom' => 'Administrateur',
                'id_usager' => 'admin@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Editeur',
                'id_usager' => 'editor@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Utilisateur',
                'id_usager' => 'user@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Invité',
                'id_usager' => 'guest@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
