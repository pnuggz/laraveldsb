<?php

use Illuminate\Database\Seeder;

class PlayersPhasesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\PlayersPhases::truncate();

    (new Faker\Generator)->seed(123);

    factory(App\PlayersPhases::class, 400)->create();
  }
}
