<?php

use Illuminate\Database\Seeder;

class LeaguePointSystemTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'goal',
      'point' => 5,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'assist',
      'point' => 4,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'pass',
      'point' => 0.02,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'keypass',
      'point' => 1,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'tackle',
      'point' => 0.4,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'interception',
      'point' => 0.4,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'clearance',
      'point' => 0.5,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'cross',
      'point' => 0.4,
    ]);

    \App\LeaguePointSystem::create([
      'league_id' => 1,
      'designation' => 'accuratecross',
      'point' => '1',
    ]);
  }
}