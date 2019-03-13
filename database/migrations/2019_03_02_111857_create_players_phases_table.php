<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersPhasesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('players_phases', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('player_id');
      $table->integer('team_phase_id');
      $table->date('start_date');
      $table->date('end_date');
      $table->decimal('height', 10, 2);
      $table->decimal('weight', 10, 2);
      $table->text('position');
      $table->integer('number');
      $table->text('depth_chart');
      $table->tinyInteger('phase_status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('players_phases');
  }
}
