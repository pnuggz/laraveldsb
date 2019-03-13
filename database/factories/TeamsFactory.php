<?php

use Faker\Generator as Faker;

$factory->define(App\Teams::class, function (Faker $faker) {
  return [
    'team_name' => $faker->name,
    'team_shorthand' => $faker->name,
    'guid' => $faker->unique()->numberBetween(1, 9999),
  ];
});
