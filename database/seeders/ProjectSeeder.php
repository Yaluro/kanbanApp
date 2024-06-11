<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert(
            [
                [
                    'nameProject' => 'arinfo',
                    'team_id' => '1',
                ],
                [
                    'nameProject' => 'kanban',
                    'team_id' => '2',
                ],
                [
                    'nameProject' => 'laravel',
                    'team_id' => '3',
                ],
            ]

        );
    }
}
