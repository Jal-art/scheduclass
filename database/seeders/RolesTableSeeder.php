<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['rl_id' => 1, 'rl_name' => 'Kurikulum', 'created_at' => now(), 'updated_at' => now()],
            ['rl_id' => 2, 'rl_name' => 'Teacher', 'created_at' => now(), 'updated_at' => now()],
            ['rl_id' => 3, 'rl_name' => 'Student', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
