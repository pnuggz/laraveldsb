<?php

use Illuminate\Database\Seeder;

class ContestsPrizeTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\ContestsPrize::create([
      'prize' => 1000,
      'currency' => 'AU$',
      'status' => 0,
    ]);
  }
}
