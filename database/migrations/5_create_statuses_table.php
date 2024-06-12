<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('statuses')->insert([
            ['name' => 'To Do'],
            ['name' => 'Doing'],
            ['name' => 'Done']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
;
