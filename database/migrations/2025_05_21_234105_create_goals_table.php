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
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
    $table->string('name');
    $table->text('description');

    // FK a players
    $table->unsignedBigInteger('player_id');
    $table->foreign('player_id')
          ->references('id')
          ->on('players')
          ->onDelete('cascade')
          ->onUpdate('cascade');

    // FK a games
    $table->unsignedBigInteger('game_id');
    $table->foreign('game_id')
          ->references('id')
          ->on('games')
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
        Schema::dropIfExists('goals');
    }
};
