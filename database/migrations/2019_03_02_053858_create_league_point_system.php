<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeaguePointSystem extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('league_point_system', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('league_id');
      $table->text('designation');
      $table->decimal('point');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('league_point_system');
  }
}
