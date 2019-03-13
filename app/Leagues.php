<?php

namespace App;

use App\Contests;
use App\Sports;
use Illuminate\Database\Eloquent\Model;

class Leagues extends Model {
  // Determines which database table to use
  protected $table = 'leagues';

  protected $fillable = ['league_name', 'league_shorthand'];

  public function sports() {
    return $this->belongsTo('Sports', 'sport_id');
  }

  public function contests() {
    return $this->hasMany('Contests', 'league_id');
  }

  public function pointsystem() {
    return $this->hasMany('App\LeaguePointSystem', 'league_id');
  }
}
