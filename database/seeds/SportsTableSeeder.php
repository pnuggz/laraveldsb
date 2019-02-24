<?php

use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\Sports::create([
      'sport_name' => 'Soccer',
    ]);

    \App\Sports::create([
      'sport_name' => 'Basketball',
    ]);
  }
}
