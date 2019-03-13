<?php

use Illuminate\Database\Seeder;

class SoccerStatsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    (new Faker\Generator)->seed(123);
    factory(App\SoccerStats::class, 400)->create();
  }
}
