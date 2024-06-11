<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'user1',
            'email' => 'user@example.com',
            'password' => '$2y$12$SfpOT9kfy.D7zsts/Qyae.jr5KGa/w0WXCTMOaXcAu11U.ZGoVSqG',
            'role_id' => '1',
        ],
        ['username' => 'user2',
            'email' => 'user2@example.com',
            'password' => '$2y$12$SfpOT9kfy.D7zsts/Qyae.jr5KGa/w0WXCTMOaXcAu11U.ZGoVSqG',
            'role_id' => '1',
        ],
        ['username' => 'admin',
            'email' => 'admin@example.com',
            'password' => '$2y$12$SfpOT9kfy.D7zsts/Qyae.jr5KGa/w0WXCTMOaXcAu11U.ZGoVSqG',
            'role_id' => '2',
        ],
            
        ]);
    }
}
