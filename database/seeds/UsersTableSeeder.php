<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    \App\User::truncate();

    (new Faker\Generator)->seed(123);

    factory(App\User::class, 50)->create();
  }
}
