<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\Teams::truncate();

    (new Faker\Generator)->seed(123);

    factory(App\Teams::class, 20)->create();
  }
}
