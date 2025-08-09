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
                'usr_email' => 'kurikulum@gamil.com',
                'usr_password' => Hash::make('12345678'),
                'usr_role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usr_id' => 2,
                'usr_name' => 'Teacher',
                'usr_email' => 'teacher@gamil.com',
                'usr_password' => Hash::make('12345678'),
                'usr_role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usr_id' => 3,
                'usr_name' => 'Student',
                'usr_email' => 'student@gmail.com',
                'usr_password' => Hash::make('12345678'),
                'usr_role_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
