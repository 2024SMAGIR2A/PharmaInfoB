<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sessions')->insert([
            [
                'id' => \Str::uuid(),
                'user_id' => 1,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'payload' => json_encode(['data' => 'example_payload']),
                'last_activity' => time(),
            ],
            [
                'id' => \Str::uuid(),
                'user_id' => 2,
                'ip_address' => '127.0.0.2',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)',
                'payload' => json_encode(['data' => 'example_payload']),
                'last_activity' => time(),
            ],
            [
                'id' => \Str::uuid(),
                'user_id' => 3,
                'ip_address' => '127.0.0.3',
                'user_agent' => 'Mozilla/7.0 (Macintosh; Intel Mac OS X 10_15_7)',
                'payload' => json_encode(['data' => 'example_payload']),
                'last_activity' => time(),
            ],
            [
                'id' => \Str::uuid(),
                'user_id' => 4,
                'ip_address' => '127.0.0.4',
                'user_agent' => 'Mozilla/8.0 (Macintosh; Intel Mac OS X 10_15_7)',
                'payload' => json_encode(['data' => 'example_payload']),
                'last_activity' => time(),
            ],
        ]);
    }
}

