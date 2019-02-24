<?php

use Illuminate\Database\Seeder;

class SportsEventsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\SportsEvents::truncate();

    (new Faker\Generator)->seed(123);

    factory(App\SportsEvents::class, 147)->create();
  }
}
