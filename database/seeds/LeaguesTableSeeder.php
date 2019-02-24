<?php

use Illuminate\Database\Seeder;

class LeaguesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    \App\Leagues::create([
      'sport_id' => 1,
      'league_name' => 'Barclays Premier League',
      'league_shorthand' => 'BPL',
      'league_country' => 'United Kingdom',
    ]);

    \App\Leagues::create([
      'sport_id' => 1,
      'league_name' => 'UEFA Champions League',
      'league_shorthand' => 'CL',
      'league_country' => 'World',
    ]);

  }
}
