<?php

namespace App;

use App\Leagues;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model {
  protected $table = 'teams';

  public function leagues() {
    return $this->belongsTo('Leagues', 'league_id');
  }

  public function teamsphases() {
    return $this->hasMany('TeamsPhases', 'team_id', 'id');
  }

}
