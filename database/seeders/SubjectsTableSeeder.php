<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('subjects')->insert([
            [
                'subject_id' => 1,
                'subject_name' => 'Mathematics',
                'subject_code' => 'MATH',
                'subject_description' => 'Basic Mathematics subject',
                'subject_created_by' => 1, // sesuaikan dengan user valid
                'subject_updated_by' => null,
                'subject_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'subject_id' => 2,
                'subject_name' => 'English',
                'subject_code' => 'ENG',
                'subject_description' => 'English language subject',
                'subject_created_by' => 1,
                'subject_updated_by' => null,
                'subject_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'subject_id' => 3,
                'subject_name' => 'Computer Programming',
                'subject_code' => 'CP',
                'subject_description' => 'Programming basics',
                'subject_created_by' => 1,
                'subject_updated_by' => null,
                'subject_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
