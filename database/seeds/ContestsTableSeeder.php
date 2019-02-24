<?php

use Illuminate\Database\Seeder;

class ContestsTableSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    \App\Contests::truncate();

    (new Faker\Generator)->seed(123);

    factory(App\Contests::class, 50)->create();
  }
}
