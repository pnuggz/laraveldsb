<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayersPhases extends Model {
  public function players() {
    return $this->belongsTo('App\Players', 'player_id', 'id');
  }

  public function teamsphases() {
    return $this->belongsTo('App\TeamsPhases', 'team_phase_id', 'id');
  }

  public function soccerstats() {
    return $this->hasMany('App\SoccerStats', 'player_phase_id', 'id');
  }

}
