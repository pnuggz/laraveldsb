<?php

use Illuminate\Database\Seeder;

class TeamsPhasesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\TeamsPhases::truncate();

    (new Faker\Generator)->seed(123);

    factory(App\TeamsPhases::class, 20)->create();
  }
}
