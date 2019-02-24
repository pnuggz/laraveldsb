<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaguesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('leagues', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('sport_id');
      $table->text('league_name');
      $table->text('league_shorthand');
      $table->text('league_country');
      $table->text('logo_desktop')->nullable();
      $table->text('logo_tablet')->nullable();
      $table->text('logo_mobile')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('leagues');
  }
}
