<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('players', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('sport_id');
      $table->text('first_name');
      $table->text('last_name')->nullable();
      $table->text('nickname')->nullable();
      $table->date('dob');
      $table->text('nationality');
      $table->text('photo')->nullable();
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
    Schema::dropIfExists('players');
  }
}
