<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notifications')->insert([
            ['data' => json_encode([
                'id_Client' => 1,
                'message' => 'Your car is ready for pickup.',
                'type' => 'Reminder'
            ])],
            ['data' => json_encode([
                'id_Client' => 2,
                'message' => 'Your scheduled service is tomorrow.',
                'type' => 'Appointment'
            ])],
            ['data' => json_encode([
                'id_Client' => 3,
                'message' => 'We have a special offer for you.',
                'type' => 'Promotion'
            ])],
            ['data' => json_encode([
                'id_Client' => 4,
                'message' => 'Your car maintenance is overdue.',
                'type' => 'Alert'
            ])],
            ['data' => json_encode([
                'id_Client' => 5,
                'message' => 'Payment received, thank you!',
                'type' => 'Confirmation'
            ])],
        ]);
    }
}
