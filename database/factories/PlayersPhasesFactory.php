<?php

use Faker\Generator as Faker;

$factory->define(App\PlayersPhases::class, function (Faker $faker) use ($factory) {
  return [
    'player_id' => factory(App\Players::class)->create()->id,
    'team_phase_id' => mt_rand(1, 20),
    'start_date' => "2018-08-01",
    'end_date' => "2019-06-01",
    'height' => mt_rand(1.50, 2.10),
    'weight' => mt_rand(60.00, 130.00),
    'position' => array("Goalkeeper", "Defender", "Midfielder", "Forward")[array_rand(array("Goalkeeper", "Defender", "Midfielder", "Forward"))],
    'number' => mt_rand(1, 20),
    'depth_chart' => array("Reserve", "Bench", "Starter")[array_rand(array("Reserve", "Bench", "Starter"))],
    'phase_status' => 0,
  ];
});
