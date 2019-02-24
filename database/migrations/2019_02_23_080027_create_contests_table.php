<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('contests', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('league_id');
      $table->decimal('entry_fee', 11, 2);
      $table->string('contest_name', 200);
      $table->date('start_date');
      $table->time('start_time');
      $table->integer('entry_max');
      $table->integer('entry_limit_register');
      $table->tinyInteger('guarantee_type_id');
      $table->tinyInteger('multi_type_id');
      $table->integer('contests_prize_id');
      $table->integer('sponsors_id');
      $table->tinyInteger('contest_status');
      $table->timestamps();

      // $table->foreign('league_id')->references('id')->on('leagues');
    });

    // Schema::table('contests', function (Blueprint $table) {

    // });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    // Schema::table('contests', function (Blueprint $table) {
    //   $table->dropForeign('contests_league_id_foreign');
    // });

    Schema::dropIfExists('contests');
  }
}
