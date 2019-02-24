<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\Contests::class, function (Faker $faker) {
  return [
    'league_id' => 1,
    'entry_fee' => mt_rand(0, 5),
    'contest_name' => $faker->name,
    'start_date' => date("Y-m-d", mt_rand(1262055681, 1262055681)),
    'start_time' => '00:00:00',
    'entry_max' => 1000,
    'entry_limit_register' => mt_rand(1, 2),
    'guarantee_type_id' => mt_rand(0, 1),
    'multi_type_id' => mt_rand(0, 1),
    'contests_prize_id' => 1,
    'sponsors_id' => 1,
    'contest_status' => 0,
  ];
});
