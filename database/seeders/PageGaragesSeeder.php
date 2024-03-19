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
        $garages = [
            [
                'nom' => 'Garage Central',
                'adresse' => '123 Rue Principale',
                'telephone' => '0123456789',
                'image' => null,
                'id_garagiste' => 1,
                'nbEmplacement' => 5,
                'horaires' => json_encode([
                    [
                      "id"=> 1,
                      "fin"=> "12:00",
                      "jour"=> "lun",
                      "debut"=> "06:00",
                      "periode"=> "am"
                    ],
                    [
                      "id"=> 2,
                      "fin"=> "18:00",
                      "jour"=> "lun",
                      "debut"=> "13:00",
                      "periode"=> "pm"
                    ],
                    [
                      "id"=> 3,
                      "fin"=> "20:00",
                      "jour"=> "lun",
                      "debut"=> "19:00",
                      "periode"=> "night"
                    ],
                    [
                      "id"=> 4,
                      "fin"=> "12:00",
                      "jour"=> "mar",
                      "debut"=> "06:45",
                      "periode"=> "am"
                    ],
                    [
                      "id"=> 5,
                      "fin"=> "17:45",
                      "jour"=> "mar",
                      "debut"=> "16:30",
                      "periode"=> "pm"
                    ],
                    [
                      "id"=> 6,
                      "fin"=> "09:45",
                      "jour"=> "mer",
                      "debut"=> "07:15",
                      "periode"=> "am"
                    ],
                    [
                      "id"=> 7,
                      "fin"=> "17:15",
                      "jour"=> "mer",
                      "debut"=> "12:00",
                      "periode"=> "pm"
                    ],
                    [
                      "id"=> 8,
                      "fin"=> "22:30",
                      "jour"=> "jeu",
                      "debut"=> "13:45",
                      "periode"=> "pm"
                    ],
                    [
                      "id"=> 9,
                      "fin"=> "11:30",
                      "jour"=> "ven",
                      "debut"=> "06:15",
                      "periode"=> "am"
                    ],
                    [
                      "id"=> 10,
                      "fin"=> "23:00",
                      "jour"=> "ven",
                      "debut"=> "15:00",
                      "periode"=> "pm"
                    ],
                    [
                      "id"=> 11,
                      "fin"=> "23:30",
                      "jour"=> "ven",
                      "debut"=> "22:30",
                      "periode"=> "night"
                    ],
                    [
                      "id"=> 12,
                      "fin"=> "23:15",
                      "jour"=> "sam",
                      "debut"=> "10:00",
                      "periode"=> "pm"
                      ]
                  ]),
            ],
        ];
        DB::table('page_garages')->insert($garages);
    }
}
