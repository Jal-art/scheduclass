<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersSubjectsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('teacher_subjects')->insert([
            [
                'ts_teacher_id' => 1, // id guru dari tabel users
                'ts_subject_id' => 1, // id mata pelajaran
            ],
            [
                'ts_teacher_id' => 1,
                'ts_subject_id' => 2,
            ],
            [
                'ts_teacher_id' => 1,
                'ts_subject_id' => 3,
            ],
        ]);
    }
}
