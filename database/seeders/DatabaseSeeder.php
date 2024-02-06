<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(VoituresSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(RendezVousSeeder::class);
        $this->call(NotificationsSeeder::class);
        $this->call(EmplacementSeeder::class);
        $this->call(PageGaragesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(ServiceRendezVousSeeder::class);
        $this->call(StatutSeeder::class);
        $this->call(ClientSeeder::class);
    }
}
