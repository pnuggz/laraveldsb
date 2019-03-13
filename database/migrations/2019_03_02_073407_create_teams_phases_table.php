<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsPhasesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('teams_phases', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('league_id');
      $table->integer('team_id');
      $table->date('start_date');
      $table->date('end_date');
      $table->text('stadium_name');
      $table->text('stadium_city');
      $table->text('stadium_country');
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
    Schema::dropIfExists('teams_phases');
  }
}
