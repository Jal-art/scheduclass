<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'usr_id' => 1,
                'usr_name' => 'Kurikulum',
                'usr_email' => 'kurikulum@gmail.com',
                'usr_password' => Hash::make('11111111'),
                'usr_role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
