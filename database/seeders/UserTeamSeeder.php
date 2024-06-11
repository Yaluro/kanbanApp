<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_team')->insert(
            [
                [
                    'user_id' => '1',
                    'team_id' => '1',
                ],
            ]

        );
    }
}
