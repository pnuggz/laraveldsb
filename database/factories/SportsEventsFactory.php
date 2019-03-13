<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\SportsEvents::class, function (Faker $faker) {
  return [
    'league_id' => 1,
    'home_team_phase_id' => mt_rand(1, 20),
    'away_team_phase_id' => mt_rand(1, 20),
    'start_date_time' => new Carbon,
    'weather_id' => NULL,
    'soccer_live_id' => NULL,
    'event_status' => 0,
    'whoscored_endlink' => 'International-FIFA-World-Cup-2018-Senegal-Colombia',
  ];
});
