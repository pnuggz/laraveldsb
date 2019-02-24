<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leagues extends Model {
  // Determines which database table to use
  protected $table = 'leagues';

  public function sport() {
    return $this->belongsTo('App\Sports', 'sport_id');
  }

  public function contest() {
    return $this->hasMany('App\Contests', 'league_id');
  }
}
