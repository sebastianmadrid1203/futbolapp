<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
             $table->string('stadium');
            $table->integer('capacity');
             $table->year('year_of_foundation');

    // FK a presidents (forma detallada)
          $table->unsignedBigInteger('president_id');
           $table->foreign('president_id')
          ->references('id')
          ->on('presidents')
          ->onDelete('cascade')
          ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
