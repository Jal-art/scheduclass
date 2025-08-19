<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('schedules')->insert([
            [
                'schedule_user_id' => 1,
                'schedule_subject_id' => 1,
                'schedule_class_level_id' => 1,
                'schedule_day' => 'Monday',
                'schedule_start_time' => '08:00:00',
                'schedule_end_time' => '09:30:00',
                'schedule_room' => 'Room A',  // wajib diisi
                'schedule_created_by' => 1,
                'schedule_updated_by' => null,
                'schedule_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'schedule_user_id' => 1,
                'schedule_subject_id' => 3,
                'schedule_class_level_id' => 2,
                'schedule_day' => 'Tuesday',
                'schedule_start_time' => '10:00:00',
                'schedule_end_time' => '11:30:00',
                'schedule_room' => 'Room B',  // wajib diisi
                'schedule_created_by' => 1,
                'schedule_updated_by' => null,
                'schedule_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
