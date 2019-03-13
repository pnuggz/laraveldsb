<?php

namespace App;

use App\Contests;
use Illuminate\Database\Eloquent\Model;

class SportsEvents extends Model {
  protected $fillable = ['start_date', 'status'];

  protected $table = 'sports_events';

  protected $dates = ['start_date'];

  public function contests() {
    return $this->belongsToMany('Contests', 'contests_has_sports_events', 'contest_id', 'sport_event_id');
  }

  public function hometeamphase() {
    return $this->hasOne('App\TeamsPhases', 'id', 'home_team_phase_id');
  }

  public function awayteamphase() {
    return $this->hasOne('App\TeamsPhases', 'id', 'away_team_phase_id');
  }

  public function soccerstats() {
    return $this->hasMany('App\SoccerStats', 'date', 'start_date_time');
  }

}
