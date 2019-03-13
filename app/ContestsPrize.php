<?php

namespace App;

use App\Contests;
use Illuminate\Database\Eloquent\Model;

class ContestsPrize extends Model {
  protected $table = 'contests_prizes';

  protected $fillable = ['prize', 'upto', 'currency'];

  public function contests() {
    return $this->hasMany('Contests', 'contests_prize_id');
  }
}
