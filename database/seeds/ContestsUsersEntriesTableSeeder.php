<?php

use Illuminate\Database\Seeder;

class ContestsUsersEntriesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $i = 1;
    $k = 50;
    while ($i < $k) {
      \App\ContestsUsersEntries::create([
        'contest_id' => $i,
        'user_id' => $i,
        'user_entry_count' => 1,
        'status' => 0,
      ]);
      $i++;
    }
  }
}
