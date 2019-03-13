<?php

namespace App;

use App\ContestsPrize;
use App\ContestsUsersEntries;
use App\Leagues;
use App\SportsEvents;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contests extends Model {
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'league_id', 'entry_fee', 'contest_name', 'start_date', 'start_time', 'entry_max', 'entry_limit_register', 'guarantee_type_id', 'multi_type_id', 'contests_prizes_id', 'sponsors_id', 'contests_status',
  ];

  protected $hidden = [
    'league_id',
  ];

  // Determines which database table to use
  protected $table = 'contests';

  public function sportsevents() {
    return $this->belongsToMany('App\SportsEvents', 'contests_has_sports_events', 'contests_id', 'sports_events_id');
  }

  public function contestsprize() {
    return $this->belongsTo('App\ContestsPrize', 'contests_prize_id');
  }

  public function leagues() {
    return $this->belongsTo('App\Leagues', 'league_id');
  }

  public function contestsusersentries() {
    return $this->hasMany('App\ContestsUsersEntries', 'contest_id', 'id');
  }

  public function getContestsComplete() {
    $contests = new Contests;
    $query = $contests->with([
      'contestsprize',
      'leagues',
      'sportsevents',
      'contestsusersentries',
    ])
      ->where('contest_status', '=', '0')
      ->paginate(20);

    $user_id = Auth::id();

    foreach ($query as $row) {
      $sportsevents_start_date_time = Carbon::create(3000, 0, 0, 0);
      $total_entry_count = 0;
      $user_entry_count = 0;

      foreach ($row->sportsevents as $sportsevent) {
        if ($sportsevent->start_date_time < $sportsevents_start_date_time) {
          $sportsevents_start_date_time = $sportsevent->start_date_time;
        }
      }

      foreach ($row->contestsusersentries as $contestsusersentry) {
        $total_entry_count++;

        if ($contestsusersentry->user_id == $user_id) {
          $user_entry_count++;
        }
      }

      $row->sports_events_start_date_time = (new Carbon($sportsevents_start_date_time))->subMinutes(30);
      $row->total_entry_count = $total_entry_count;
      $row->user_entry_count = $user_entry_count;
    }

    return $query;
  }

  public function getContestDetails($contest_id) {
    $contests = new Contests;
    $query = $contests->with([
      'contestsprize',
      'leagues',
      'sportsevents',
      'sportsevents.hometeamphase.teams',
      'sportsevents.awayteamphase.teams',
      'contestsusersentries',
      'leagues.pointsystem',
    ])
      ->where('contest_status', '=', '0')
      ->where('id', '=', $contest_id)
      ->get();

    $user_id = Auth::id();

    foreach ($query as $row) {
      $sportsevents_start_date_time = Carbon::create(3000, 0, 0, 0);
      $total_entry_count = 0;
      $user_entry_count = 0;

      foreach ($row->sportsevents as $sportsevent) {
        if ($sportsevent->start_date_time < $sportsevents_start_date_time) {
          $sportsevents_start_date_time = $sportsevent->start_date_time;
        }
      }

      foreach ($row->contestsusersentries as $contestsusersentry) {
        $total_entry_count++;

        if ($contestsusersentry->user_id == $user_id) {
          $user_entry_count++;
        }
      }

      $row->sports_events_start_date_time = (new Carbon($sportsevents_start_date_time))->subMinutes(30);
      $row->total_entry_count = $total_entry_count;
      $row->user_entry_count = $user_entry_count;
    }

    return $query;
  }

  // public function getContestDraft($contest_id) {
  //   $contests = new Contests;
  //   $query = $contests->with([
  //     'contestsprize',
  //     'leagues',
  //     'sportsevents',
  //     'sportsevents.hometeamphase.teams',
  //     'sportsevents.awayteamphase.teams',
  //     'contestsusersentries',
  //     'leagues.pointsystem',
  //   ])
  //     ->where('contest_status', '=', '0')
  //     ->where('id', '=', $contest_id)
  //     ->get();

  //   $contests2 = new Contests;
  //   $query2 = $contests->with([
  //     'sportsevents.hometeamphase.playersphases.soccerstats',
  //     'sportsevents.awayteamphase.playersphases.soccerstats',
  //   ])
  //     ->whereHas('sportsevents', function ($q) {
  //       $q->whereHas('hometeamphase', function ($q) {
  //         $q->whereHas('playersphases', function ($q) {
  //           $q->whereHas('soccerstats', function ($q) {
  //             $q->where('date', '=', '"2018-06-29 00:00:00"');
  //           })
  //             ->where('phase_status', '=', 0);
  //         });
  //       })
  //         ->whereHas('awayteamphase', function ($q) {
  //           $q->whereHas('playersphases', function ($q) {
  //             $q->whereHas('soccerstats', function ($q) {
  //               $q->where('date', '=', '"2018-06-29 00:00:00"');
  //             })
  //               ->where('phase_status', '=', 0);
  //           });
  //         });
  //     })
  //     ->where('id', '=', $contest_id)
  //     ->get();
  //   // $query2 = $contests2->with([
  //   //   'sportsevents.hometeamphase.playersphases.players',
  //   //   'sportsevents.awayteamphase.playersphases.players',
  //   // ])
  //   //   ->where('id', '=', $contest_id)
  //   //   ->get();

  //   // $players = [];

  //   // foreach ($query2 as $row) {
  //   //   foreach ($row->sportsevents as $sportevent) {
  //   //     foreach ($sportevent->hometeamphase->playersphases as $playerphase) {
  //   //       array_push($players, $playerphase);
  //   //     }
  //   //   }
  //   // }

  //   // foreach ($query2 as $row) {
  //   //   foreach ($row->sportsevents as $sportevent) {
  //   //     foreach ($sportevent->awayteamphase->playersphases as $playerphase) {
  //   //       array_push($players, $playerphase);
  //   //     }
  //   //   }
  //   // }

  //   $user_id = Auth::id();
  //   $sportseventsdatetime = array();
  //   foreach ($query as $row) {
  //     $sportsevents_start_date_time = Carbon::create(3000, 0, 0, 0);
  //     $total_entry_count = 0;
  //     $user_entry_count = 0;

  //     foreach ($row->sportsevents as $sportsevent) {
  //       array_push($sportseventsdatetime, new Carbon($sportsevent->start_date_time));

  //       if ($sportsevent->start_date_time < $sportsevents_start_date_time) {
  //         $sportsevents_start_date_time = $sportsevent->start_date_time;
  //       }
  //     }

  //     foreach ($row->contestsusersentries as $contestsusersentry) {
  //       $total_entry_count++;

  //       if ($contestsusersentry->user_id == $user_id) {
  //         $user_entry_count++;
  //       }
  //     }

  //     $row->sports_events_start_date_time = (new Carbon($sportsevents_start_date_time))->subMinutes(30);
  //     $row->total_entry_count = $total_entry_count;
  //     $row->user_entry_count = $user_entry_count;
  //   }

  //   $sportseventsdatetime_unique = array_unique($sportseventsdatetime);
  //   return $query2;
  // }

  public function getContestDraft($contest_id) {
    $contests = new Contests;
    $query = $contests->with([
      'contestsprize',
      'leagues',
      'sportsevents.hometeamphase.teams',
      'sportsevents.awayteamphase.teams',
      'contestsusersentries',
      'leagues.pointsystem',
    ])
      ->where('id', '=', $contest_id)
      ->get();

    $user_id = Auth::id();
    $sportseventsdatetime = array();
    foreach ($query as $row) {
      $sportsevents_start_date_time = Carbon::create(3000, 0, 0, 0);
      $total_entry_count = 0;
      $user_entry_count = 0;
      $leaguepointsystem = array();

      foreach ($row->sportsevents as $sportsevent) {
        array_push($sportseventsdatetime, new Carbon($sportsevent->start_date_time));

        if ($sportsevent->start_date_time < $sportsevents_start_date_time) {
          $sportsevents_start_date_time = $sportsevent->start_date_time;
        }
      }

      foreach ($row->contestsusersentries as $contestsusersentry) {
        $total_entry_count++;

        if ($contestsusersentry->user_id == $user_id) {
          $user_entry_count++;
        }
      }

      $row->sports_events_start_date_time = (new Carbon($sportsevents_start_date_time))->subMinutes(30);
      $row->total_entry_count = $total_entry_count;
      $row->user_entry_count = $user_entry_count;
    }

    $sportseventsdatetime_unique = array_unique($sportseventsdatetime);

    $contests2 = new Contests;
    $query2 = $contests2->with([
      'sportsevents.hometeamphase.teams',
      'sportsevents.awayteamphase.teams',
      'sportsevents.hometeamphase.playersphases.players',
      'sportsevents.awayteamphase.playersphases.players',
      'sportsevents.hometeamphase.playersphases.teamsphases.teams',
      'sportsevents.awayteamphase.playersphases.teamsphases.teams',
      'sportsevents.hometeamphase.playersphases.soccerstats' => function ($q) use ($sportseventsdatetime_unique) {
        $i = 0;
        foreach ($sportseventsdatetime_unique as $datetime) {
          if ($i == 0) {
            $q->where('date', '=', $datetime);
          } else {
            $q->orWhere('date', '=', $datetime);
          }
          $i++;
        }
      },
      'sportsevents.awayteamphase.playersphases.soccerstats' => function ($q) use ($sportseventsdatetime_unique) {
        $i = 0;
        foreach ($sportseventsdatetime_unique as $datetime) {
          if ($i == 0) {
            $q->where('date', '=', $datetime);
          } else {
            $q->orWhere('date', '=', $datetime);
          }
          $i++;
        }
      },
    ])
      ->whereHas(
        'sportsevents', function ($q) {
          $q->where('event_status', '=', '0');
        }
      )
      ->where('id', '=', $contest_id)
      ->get();

    $players = array();

    foreach ($query2[0]->sportsevents as $row2) {
      foreach ($row2->hometeamphase->playersphases as $subrow2) {
        array_push($players, $subrow2);
      }
      foreach ($row2->awayteamphase->playersphases as $subrow2) {
        array_push($players, $subrow2);
      }
    }

    foreach ($players as $row) {
      foreach ($query[0]->sportsevents as $row2) {
        if ($row->team_phase_id == $row2->hometeamphase->id) {
          $row->opposition = $row2->awayteamphase;
          $row->homeaway = 'home';
        } else if ($row->team_phase_id == $row2->awayteamphase->id) {
          $row->opposition = $row2->hometeamphase;
          $row->homeaway = 'away';
        }
      }
    }

    $data = array(
      'contestdetails' => $query,
      'players' => $players,
    );

    return $data;
  }

}
