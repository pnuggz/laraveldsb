<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsPrizesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('contests_prizes', function (Blueprint $table) {
      $table->increments('id');
      $table->decimal('prize', 8, 2);
      $table->decimal('upto', 8, 2)->nullable()->default(0);
      $table->text('currency');
      $table->tinyInteger('status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('contests_prizes');
  }
}
