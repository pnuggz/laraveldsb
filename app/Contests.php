<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contests extends Model {
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'league_id', 'entry_fee', 'contest_name', 'start_date', 'start_time', 'entry_max', 'entry_limit_register', 'guarantee_type_id', 'multi_type_id', 'contests_prizes_id', 'sponsors_id', 'contests_status',
  ];

  // Determines which database table to use
  protected $table = 'contests';

  public function league() {
    return $this->belongsTo('App\Leagues', 'league_id');
  }

  public function scopeActive($query) {
    $result = $query->where('contest_status', 0);
    return $result;
  }

  public function scopeContestsWithUserEntry() {
    $id = 1;
    $contestsSportsEventsStartDateTime = DB::table('contests_has_sports_events')
      ->distinct()
      ->select('contests_has_sports_events.contests_id', 'sports_events.start_date', 'sports_events.start_time')
      ->join('sports_events', 'sports_events.id', '=', 'contests_has_sports_events.sports_events_id')
      ->orderBy('contests_has_sports_events.contests_id', 'ASC')
      ->orderBy('sports_events.start_date', 'ASC')
      ->orderBy('sports_events.start_time', 'ASC');

    $contestsStartDateTime = DB::table('contests')
      ->select('contests_sports_events_start_date_time.contests_id', 'contests_sports_events_start_date_time.start_date', 'contests_sports_events_start_date_time.start_time')
      ->joinSub($contestsSportsEventsStartDateTime, 'contests_sports_events_start_date_time', function ($join) {
        $join->on('contests.id', '=', 'contests_sports_events_start_date_time.contests_id');
      })
      ->groupBy('contests_sports_events_start_date_time.contests_id');

    $contestsUsersEntriesCount = DB::table('contests_users_entries')
      ->select(DB::raw('contests_users_entries.contest_id, COUNT(*) as entry'))
      ->groupBy('contests_users_entries.contest_id');

    $contests = DB::table('contests')
      ->leftJoin('contests_prizes', 'contests_prizes.id', '=', 'contests.contests_prize_id')
      ->join('leagues', 'leagues.id', '=', 'contests.league_id')
      ->joinSub($contestsStartDateTime, 'contests_start_date_time', function ($join) {
        $join->on('contests.id', '=', 'contests_start_date_time.contests_id');
      })
      ->joinSub($contestsUsersEntriesCount, 'contests_users_entries_count', function ($join) {
        $join->on('contests.id', '=', 'contests_users_entries_count.contest_id');
      })
      ->where('contests.contest_status', 0)
      ->get();

    return $contests;
  }
}
