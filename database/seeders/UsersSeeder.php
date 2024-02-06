<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'prenom' => 'Jean',
                'nom' => 'Dupont',
                'email' => 'jean.dupont@example.com',
                'password' => Hash::make('password123'),
                'telephone' => '0102030405',
                'id_role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prenom' => 'Marie',
                'nom' => 'Durand',
                'email' => 'marie.durand@example.com',
                'password' => Hash::make('motdepasse'),
                'telephone' => '0607080910',
                'id_role' => '2',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prenom' => 'Luc',
                'nom' => 'Martin',
                'email' => 'luc.martin@example.com',
                'password' => Hash::make('motdepasse456'),
                'telephone' => '0506070809',
                'id_role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prenom' => 'Sophie',
                'nom' => 'Lemaitre',
                'email' => 'sophie.lemaitre@example.com',
                'password' => Hash::make('password789'),
                'telephone' => '0203040506',
                'id_role' => '2',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prenom' => 'Alexandre',
                'nom' => 'Bernard',
                'email' => 'alexandre.bernard@example.com',
                'password' => Hash::make('password456'),
                'telephone' => '0708091011',
                'id_role' => '3',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prenom' => 'Chloé',
                'nom' => 'Petit',
                'email' => 'chloe.petit@example.com',
                'password' => Hash::make('simplepassword'),
                'telephone' => '0304050607',
                'id_role' => '1',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
