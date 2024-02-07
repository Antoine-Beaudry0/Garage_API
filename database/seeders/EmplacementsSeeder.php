<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmplacementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('emplacements')->insert([
            ['id_garage' => '1'],
            ['id_garage' => '2'],
            ['id_garage' => '3'],
            ['id_garage' => '4'],
            ['id_garage' => '5'],
            ['id_garage' => '6'],
            ['id_garage' => '7'],
            ['id_garage' => '8'],
            ['id_garage' => '9'],
            ['id_garage' => '10'],
        ]);
    }
}
