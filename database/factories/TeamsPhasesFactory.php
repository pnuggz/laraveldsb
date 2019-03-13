<?php

use Faker\Generator as Faker;

$factory->define(App\TeamsPhases::class, function (Faker $faker) {
  $i = 0;
  return [
    'league_id' => 1,
    'team_id' => $i++,
    'start_date' => "2018-08-01",
    'end_date' => "2019-06-01",
    'stadium_name' => $faker->name,
    'stadium_city' => $faker->name,
    'stadium_country' => "UK",
    'phase_status' => 0,
  ];
});