<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassLevelsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('class_levels')->insert([
            [
                'class_level_id' => 1,
                'class_level_name' => 'Grade 10',
                'class_level_description' => 'Description for Grade 10',
                'class_created_by' => 1,    // sesuaikan dengan user yang valid di tabel users
                'class_updated_by' => null,
                'class_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_level_id' => 2,
                'class_level_name' => 'Grade 11',
                'class_level_description' => 'Description for Grade 11',
                'class_created_by' => 1,
                'class_updated_by' => null,
                'class_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'class_level_id' => 3,
                'class_level_name' => 'Grade 12',
                'class_level_description' => 'Description for Grade 12',
                'class_created_by' => 1,
                'class_updated_by' => null,
                'class_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
