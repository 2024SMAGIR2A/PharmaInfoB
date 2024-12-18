<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetTokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('password_reset_tokens')->insert([
            [
                'email' => 'admin@example.com',
                'token' => \Str::random(60),
                'created_at' => now(),
            ],
            [
                'email' => 'explorer@example.com',
                'token' => \Str::random(60),
                'created_at' => now(),
            ],
            [
                'email' => 'ph@example.com',
                'token' => \Str::random(60),
                'created_at' => now(),
            ],
            [
                'email' => 'ph2@example.com',
                'token' => \Str::random(60),
                'created_at' => now(),
            ],
        ]);
    }
}
