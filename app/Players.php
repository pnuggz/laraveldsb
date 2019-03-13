<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Players extends Model {
  public function playersphases() {
    return $this->hasMany('App\PlayersPhases', 'player_id', 'id');
  }
}
