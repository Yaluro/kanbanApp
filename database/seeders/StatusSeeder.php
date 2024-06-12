<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('statuses')->insert([
            ['toDo' => true, 'doing' => false, 'done' => false],
            ['toDo' => false, 'doing' => true, 'done' => false],
            ['toDo' => false, 'doing' => false, 'done' => true],
        ]);
    }
}
