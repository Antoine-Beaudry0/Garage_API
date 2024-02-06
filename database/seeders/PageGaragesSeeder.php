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
        DB::table('pageGarages')->insert([
            [
                'heuresOuverture' => '08:00',
                'heuresFermetures' => '18:00',
                'id_usager' => 'user1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'heuresOuverture' => '09:00',
                'heuresFermetures' => '17:00',
                'id_usager' => 'user2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'heuresOuverture' => '10:00',
                'heuresFermetures' => '19:00',
                'id_usager' => 'user3@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'heuresOuverture' => '07:00',
                'heuresFermetures' => '16:00',
                'id_usager' => 'user4@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'heuresOuverture' => '06:00',
                'heuresFermetures' => '14:00',
                'id_usager' => 'user5@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
