<?php

use Faker\Generator as Faker;

$autoIncrement2 = autoIncrement2();

$factory->define(App\SoccerStats::class, function (Faker $faker) use ($autoIncrement2) {
  $autoIncrement2->next();
  return [
    'player_phase_id' => $autoIncrement2->current(),
    'date' => '2018-06-25',
    'salary' => mt_rand(5000, 15000),
    'goals' => mt_rand(0, 1),
    'assists' => mt_rand(0, 1),
    'key_passes' => mt_rand(0, 3),
    'tackles' => mt_rand(0, 5),
    'interceptions' => mt_rand(0, 6),
    'clearances' => mt_rand(0, 6),
    'passes' => mt_rand(0, 50),
    'crosses' => mt_rand(0, 8),
    'accurate_crosses' => mt_rand(0, 4),
    'saves' => mt_rand(0, 3),
    'goal_against' => mt_rand(0, 3),
    'minutes' => mt_rand(0, 90),
    'total_fp' => mt_rand(0, 20),
  ];
});

function autoIncrement2() {
  for ($i = 0; $i < 1000; $i++) {
    yield $i;
  }
}