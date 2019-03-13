<?php

namespace App;

use App\Contests;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ContestsUsersEntries extends Model {
  protected $table = 'contests_users_entries';

  protected $fillable = ['contest_id', 'user_id'];

  public function contests() {
    return $this->belongsTo('Contests', 'contest_id');
  }

  public function user() {
    return $this->belongsTo('User', 'user_id');
  }

}
