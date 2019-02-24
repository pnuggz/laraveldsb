<?php

use Illuminate\Database\Seeder;

class ContestsHasSportsEventsTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $i = 1;
    $k = 50;
    while ($i < $k) {
      \App\ContestsHasSportsEvents::create([
        'contests_id' => $i,
        'sports_events_id' => $i,
      ]);

      \App\ContestsHasSportsEvents::create([
        'contests_id' => $i,
        'sports_events_id' => $i + 1,
      ]);

      \App\ContestsHasSportsEvents::create([
        'contests_id' => $i,
        'sports_events_id' => $i + 2,
      ]);
      $i++;
    }
  }
}
