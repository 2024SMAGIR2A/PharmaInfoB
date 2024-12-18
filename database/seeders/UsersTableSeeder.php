<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id_utilisateur' => 1,
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_utilisateur' => 2,
                'name' => 'Regular User',
                'email' => 'explorer@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('explorer123'),
                'role' => 'explorer',
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_utilisateur' => 3,
                'name' => 'pharmacien User',
                'email' => 'ph@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('ph00001'),
                'role' => 'pharmacien',
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_utilisateur' => 4,
                'name' => 'ph 2 User',
                'email' => 'ph2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('ph00002'),
                'role' => 'pharmacien',
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

