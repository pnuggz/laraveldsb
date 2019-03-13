<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoccerStatsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('soccer_stats', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('player_phase_id');
      $table->date('date');
      $table->decimal('salary', 10, 2);
      $table->integer('goals');
      $table->integer('assists');
      $table->integer('key_passes');
      $table->integer('tackles');
      $table->integer('interceptions');
      $table->integer('clearances');
      $table->integer('passes');
      $table->integer('crosses');
      $table->integer('accurate_crosses');
      $table->integer('saves');
      $table->integer('goal_against');
      $table->integer('minutes');
      $table->decimal('total_fp', 10, 2);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('soccer_stats');
  }
}
