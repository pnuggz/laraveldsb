<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsEventsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('sports_events', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('league_id');
      $table->integer('home_team_phase_id');
      $table->integer('away_team_phase_id');
      $table->dateTime('start_date_time');
      $table->integer('weather_id')->nullable();
      $table->integer('soccer_live_id')->nullable();
      $table->string('whoscored_endlink', 255);
      $table->tinyInteger('event_status')->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('sports_events');
  }
}
