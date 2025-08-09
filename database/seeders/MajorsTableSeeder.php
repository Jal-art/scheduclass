<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('majors')->insert([
            [
                'major_id' => 1,
                'major_name' => 'Computer Science',
                'major_code' => 'CS',
                'major_description' => 'Study of computer systems, software, and algorithms',
                'major_created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'major_id' => 2,
                'major_name' => 'Business Administration',
                'major_code' => 'BA',
                'major_description' => 'Management and administration of business operations',
                'major_created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
