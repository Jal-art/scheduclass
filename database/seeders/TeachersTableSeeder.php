<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('teachers')->insert([
            [
                'teacher_id' => 2,
                'teacher_subject_id' => 1, // contoh subject utama
                'teacher_created_by' => 1,
                'teacher_updated_by' => null,
                'teacher_deleted_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // tambah data guru lain jika perlu
        ]);
    }
}
