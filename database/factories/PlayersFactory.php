<?php

use Faker\Generator as Faker;

$factory->define(App\Players::class, function (Faker $faker) {
  return [
    'sport_id' => 1,
    'first_name' => $faker->name,
    'last_name' => $faker->name,
    'dob' => date("Y-m-d", mt_rand(1262055681, 1262055681)),
    'nationality' => $faker->country,
    'guid' => $faker->unique()->numberBetween(1, 9999),
  ];
});