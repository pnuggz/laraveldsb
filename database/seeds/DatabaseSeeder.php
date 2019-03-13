<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    $this->call(UsersTableSeeder::class);
    $this->call(SportsTableSeeder::class);
    $this->call(LeaguesTableSeeder::class);
    $this->call(ContestsTableSeeder::class);
    $this->call(ContestsPrizeTableSeeder::class);
    $this->call(SportsEventsTableSeeder::class);
    $this->call(ContestsHasSportsEventsTableSeeder::class);
    $this->call(ContestsUsersEntriesTableSeeder::class);
    $this->call(LeaguePointSystemTableSeeder::class);
    $this->call(TeamsTableSeeder::class);
    $this->call(TeamsPhasesTableSeeder::class);
    $this->call(PlayersPhasesTableSeeder::class);
  }
}
