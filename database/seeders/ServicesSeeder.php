<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            ['data' => 'Wheel Alignment',           'prix' => '79.99',      'temps' => '60',    'id_garage' => '2'],
            ['data' => 'Transmission Service',      'prix' => '250.00',     'temps' => '180',   'id_garage' => '3'],
            ['data' => 'Engine Tune-Up',            'prix' => '149.99',     'temps' => '120',   'id_garage' => '4'],
            ['data' => 'Suspension Repair',         'prix' => '300.00',     'temps' => '240',   'id_garage' => '2'],
            ['data' => 'Electrical System Diagnostics', 'prix' => '99.99',  'temps' => '90',    'id_garage' => '5'],
            ['data' => 'Pre-Purchase Inspection',   'prix' => '175.00',     'temps' => '120',   'id_garage' => '1'],
            ['data' => 'Headlight Restoration',     'prix' => '59.99',      'temps' => '45',    'id_garage' => '3'],
            ['data' => 'Vehicle Detailing',         'prix' => '199.99',     'temps' => '240',   'id_garage' => '4'],
            ['data' => 'Air Filter Replacement',    'prix' => '39.99',      'temps' => '20',    'id_garage' => '1'],
            ['data' => 'Battery Replacement',       'prix' => '120.00',     'temps' => '45',    'id_garage' => '5'],        
        ];

        DB::table('services')->insert($services);
    }
}
