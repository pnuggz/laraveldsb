<?php

use Faker\Generator as Faker;

$factory->define(App\SportsEvents::class, function (Faker $faker) {
  return [
    'league_id' => 1,
    'home_team_phase_id' => mt_rand(1, 20),
    'away_team_phase_id' => mt_rand(1, 20),
    'start_date' => date("Y-m-d", mt_rand(1262055681, 1262055681)),
    'start_time' => '00:00:00',
    'weather_id' => NULL,
    'soccer_live_id' => NULL,
    'event_status'  => 0,
    'whoscored_endlink' => 'International-FIFA-World-Cup-2018-Senegal-Colombia'
  ];
});
