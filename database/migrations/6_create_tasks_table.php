<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('id_task');
            $table->string('nameTask', 50)->nullable();
            $table->text('description');
            $table->dateTime('endDate');
            $table->unsignedBigInteger('id_status');
            $table->foreign('id_status')->references('id_status')->on('statuses');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
