<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sports extends Model {
  // Determines which database table to use
  protected $table = 'sports';

  public function league() {
    return $this->hasMany('League');
  }
}
