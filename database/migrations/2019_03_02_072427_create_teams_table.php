<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('teams', function (Blueprint $table) {
      $table->increments('id');
      $table->text('team_name');
      $table->text('team_nickname')->nullable();
      $table->text('team_shorthand');
      $table->integer('guid');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('teams');
  }
}
