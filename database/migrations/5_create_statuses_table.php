<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->boolean('toDo')->default(false);
            $table->boolean('doing')->default(false);
            $table->boolean('done')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statuses');
    }
};
