<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamsPhases extends Model {
  protected $table = 'teams_phases';

  public function teams() {
    return $this->belongsTo('App\Teams', 'team_id', 'id');
  }

  public function playersphases() {
    return $this->hasMany('App\PlayersPhases', 'team_phase_id', 'id');
  }
}
