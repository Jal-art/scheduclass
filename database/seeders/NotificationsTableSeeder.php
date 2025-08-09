<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notifications')->insert([
            [
                'notification_user_id' => 3,
                'notification_type' => 'Info',
                'notification_message' => 'Welcome to the system!',
                'notification_read_at' => null,
                'notification_created_by' => 1, // contoh admin user id
                'notification_updated_by' => null,
                'notification_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'notification_user_id' => 2,
                'notification_type' => 'Reminder',
                'notification_message' => 'You have a class tomorrow.',
                'notification_read_at' => null,
                'notification_created_by' => 1,
                'notification_updated_by' => null,
                'notification_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
