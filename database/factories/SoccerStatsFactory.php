<?php

use Faker\Generator as Faker;

$autoIncrement = autoIncrement();

$factory->define(App\SoccerStats::class, function (Faker $faker) use ($autoIncrement) {
  $autoIncrement->next();
  return [
    'player_phase_id' => $autoIncrement->current(),
    'date' => '2018-06-29',
    'salary' => 8000,
    'goals' => 0,
    'assists' => 0,
    'key_passes' => 0,
    'tackles' => 0,
    'interceptions' => 0,
    'clearances' => 0,
    'passes' => 0,
    'crosses' => 0,
    'accurate_crosses' => 0,
    'saves' => 0,
    'goal_against' => 0,
    'minutes' => 0,
    'total_fp' => 0,
  ];
});

function autoIncrement() {
  for ($i = 0; $i < 1000; $i++) {
    yield $i;
  }
}