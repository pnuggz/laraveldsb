@extends('layouts.app')

@section('content')
<script>
  var event_length = {!! count($contestdetails[0]->sportsevents) !!}
  if ( event_length > 4) {
    var salary = 100000
  } else {
    var salary = 60000
  }
  var pos;
  var posCount;
  var players_select = [];
</script>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <h3 class="card-header text-center">Team Draft</h3>

        <h3 class="card-header text-center" data-toggle="modal" data-target="#contestDetailsModal" contest_id="{{$contestdetails[0]->id}}">{{ $contestdetails[0]->contest_name }}</h3>
        <div class="card-body">
          {{--Row Lvel 1--}}
          <div class="row">
            <div class="col-lg-6 col-xl-6">
              <div class="row">
                <div class="col-lg-6 col-xl-6">
                  <div class="row">
                    <div class="col-lg-6 col-xl-6">
                      Entry Size
                    </div>
                    <div class="col-lg-6 col-xl-6">
                      {{ $contestdetails[0]->total_entry_count }}/{{ $contestdetails[0]->entry_max }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-xl-6">
                      User Entry
                    </div>
                    <div class="col-lg-6 col-xl-6">
                      {{ $contestdetails[0]->user_entry_count }}/{{ $contestdetails[0]->entry_limit_register }}
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-xl-6">
                  <div class="row">
                    <div class="col-lg-12 col-xl-12">
                      Prize
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-xl-12">
                      {{ $contestdetails[0]->contestsprize->currency }}{{ $contestdetails[0]->contestsprize->prize }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-6">
              Sponsors
            </div>
          </div>

          {{--Row Level 2--}}
          <div class="row">
            <div class="col-lg-6 col-xl-6">
              <div class="row">
                <div class="col-lg-6 col-xl-6">
                  <input type="text" name="playersearch" id="playersearch" placeholder="Search Player...">
                </div>
                <div class="col-lg-6 col-xl-6">
                  <select name="matchfilter" id="matchfilter">
                    <option value="all">All Matches</option>
                    @foreach ($contestdetails[0]->sportsevents as $sportevent)
                    <option value="{{ $sportevent->awayteamphase->teams->team_name }} @ {{ $sportevent->hometeamphase->teams->team_name }}">
                      {{ $sportevent->awayteamphase->teams->team_name }} @ {{ $sportevent->hometeamphase->teams->team_name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-6">
              <div class="row">
                <div class="col-lg-12 col-xl-12">
                  Countdown Timer
                </div>
              </div>
            </div>
          </div>

          {{--Row Level 3--}}
          <div class="row">
            <div class="col-lg-6 col-xl-6">
              <div class="row">
                <div class="col-lg-12 col-xl-12">
                  <ul class="nav nav-pills">
                    <li posFilter='all' class="nav-item">
                      <a class="nav-link active" href="#all">ALL</a>
                    </li>
                    <li posFilter='for' class="nav-item">
                      <a class="nav-link" href="#forward">FORWARD</a>
                    </li>
                    <li posFilter='mid' class="nav-item">
                      <a class="nav-link" href="#midfielder">MIDFIELDER</a>
                    </li>
                    <li posFilter='def' class="nav-item">
                      <a class="nav-link" href="#defender">DEFENDER</a>
                    </li>
                    <li posFilter='goa' class="nav-item">
                      <a class="nav-link" href="#goalkeeper">GOALKEEPER</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-xl-12" id="table-container-head">
                  <div id="table-container-thead">
                    <table class="table" id="players-head">
                      <thead>
                        <tr id="table-players-head">
                          <th id="th-name">PLAYER NAME</th>
                          <th id="th-opp">OPPONENT</th>
                          <th id="th-avg_fp">AVG. FP</th>
                          <th id="th-form">FORM</th>
                          <th id="th-salary">SALARY</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-xl-12" id="table-container-body">
                  <div id="table-container-tbody">
                    <table class="table" id="players-body">
                      <tbody>
                      @foreach($players as $player)
                        <tr id="table-players-body">
                          <td id="td-name-pos-team">
                            <span id="td-name" class="row">
                              {{ $player->players->first_name }} {{ $player->players->last_name }}
                            </span>
                            <span id="td-pos-team" class="row">
                              <span id='td-pos'>
                                {{ $player->position }}
                              </span>
                              <span> - </span>
                              <span id='td-team'>
                                {{ $player->teamsphases->teams->team_name }}
                              </span>
                            </span>
                          </td>
                          <td id="td-opponent-depth">
                            <span id="td-opponent" class="row">
                              {{ $player->opposition->teams->team_name }}
                            </span>
                            <span id="td-homeaway" class="row">
                              @if ($player->homeaway == 'home')
                              Home
                              @else
                              Away
                              @endif
                            </span>
                            <span id="td-depth" class="row">
                              {{ $player->depth_chart }}
                            </span>
                          </td>
                          <td id="td-avg_fp">
                            Average FP
                          </td>
                          <td id="td-form">
                            Average Form
                          </td>
                          <td id="td-salary">
                            {{ $player->soccerstats[0]->salary }}
                          </td>
                          <td id="td-action">
                            <button class="button">DRAFT</button>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <button type="button" id="loadmore" class="button">Load More</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-6">
              <div class="row">
                <div class="col-lg-12 col-xl-12" id="roster-name">
                  Roster Name
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-xl-12" id="roster-table-container">
                  <div class="row" id="roster-table-container-head">
                    <div class="col-lg-4 col-xl-4">
                      <div>YOUR TEAM</div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                      <div class="row">SALARY REMAINING</div>
                      <div class="row">
                      @if (count($contestdetails[0]->sportsevents) > 4)
                        $100,000
                      @else
                        $60,000
                      @endif
                      </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                      <div class="row">AVG/PLAYER</div>
                      <div class="row">
                      @if (count($contestdetails[0]->sportsevents) > 4)
                        $10,000
                      @else
                        $10,000
                      @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-xl-12" id="roster-table-container-body">
                      <div id="roster-table-container-tbody">
                        <table class="table" id="roster-body">
                          <tbody>
                            <tr id="roster-table-players-body">
                              <td id="td-name-pos-team"></td>
                              <td id="td-opponent"></td>
                              <td id="td-avg_fp"></td>
                              <td id="td-form"></td>
                              <td id="td-salary"></td>
                              <td id="td-action"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('modals.contestDetailsModal');
<script>
$(function() {
  var lineup_defender = (
    player_phase_id = 0,
    pos = "Defender",
    salary = 0,
    selected = false
  )
	var	lineup_forward = (
    player_phase_id = 0,
    pos = "Forward",
    salary = 0,
    selected = false
  )
	var	lineup_midfielder = (
    player_phase_id = 0,
    pos = "Midfielder",
    salary = 0,
    selected = false
  )
	var	goalkeeper = (
    player_phase_id = 0,
    pos = "Goalkeeper",
    salary = 0,
    selected = false
  )

  $('[data-target="#contestDetailsModal"]').on('click', function(e) {
    var contest_id = $(this).attr("contest_id");

    axios.get(`/contests/${contest_id}/details`)
    .then(function (response) {
      var result = response.data[0];

      var contest_start_date_time = date(result.sports_events_start_date_time.date);

      $("#modal-contest-name").text(result.contest_name);
      $("#modal-user-entry").text(result.user_entry_count + "/" + result.entry_limit_register);
      $("#modal-total-entry").text(result.total_entry_count + "/" + result.entry_max);
      $("#modal-total-prize").text("$" + parseFloat(result.contestsprize.prize).toFixed(2));
      $("#modal-start-date").text(contest_start_date_time[0]);
      $("#modal-start-time").text(contest_start_date_time[1]);
      $("#modal-sports-events").html('');
      $("#pointsystem").html('');

      $.each(result.sportsevents, function(k,v) {
        sports_events_start_date_time = date(v.start_date_time)
        $("#modal-sports-events").append(`
          <li style="width: 20%; padding: 10px 0px; display: inline-block">
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                ${v.awayteamphase.teams.team_name} @ ${v.hometeamphase.teams.team_name}
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-xl-12">
                ${sports_events_start_date_time[0]} ${sports_events_start_date_time[1]}
              </div>
            </div>
          </li>
        `);
      });

      $.each(result.leagues.pointsystem, function(k,v) {
        var designation = v.designation.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
        $("#pointsystem").append(`
          <div class="row">
            <div class="col-lg-6 col-xl-6">
              ${designation}
            </div>
            <div class="col-lg-6 col-xl-6 text-right">
              ${parseFloat(v.point)}
            </div>
          </div>
        `);
      })
    })
    .catch(function (error) {
      console.log(error);
    });
  })

  window.paginationQty = 10;
  filter();

  $('#playersearch').keyup(filter);

  $('.nav-item').click(function () {
    $(this).parent().find('.active').removeClass('active');
    $(this).children().addClass('active');
    filter();
  });

  $('#matchfilter').on('change', function () {
    filter();
  });

  $('#loadmore').click(function() {
    window.paginationQty = window.paginationQty + 10
    filter();
  })

  initializeDraft(event_length)

});

function filter() {
  var rex = new RegExp($('#playersearch').val(), 'i');
  var rows = $('#players-body tbody tr');
  var pos = $('.nav-item').find('.active').text().toLowerCase();
  var match = $('#matchfilter').val().trim();
  var i = 0

  rows.hide();
  rows.filter(function () {
    var tester = true
    tester = rex.test($(this).find('#td-name').text().trim());
    tester = tester && filterOnPos($(this))
    tester = tester && filterOnMatch($(this))
    if (pos == 'all' && match == 'all') {
      tester = tester && filterPaginationQty(i)
      i++
    }
    return tester
  }).show();
}

function filterOnPos(selector) {
  var tester = true;
  var pos = $('.nav-item').find('.active').text().toLowerCase();

  if(pos == 'all') {
    return tester
  } else {
    var rowpos = $(selector).find('#td-pos').text().trim().toLowerCase();
    if (pos != rowpos) {
      tester = false;
    }
    return tester;
  }
}

function filterOnMatch(selector) {
  var tester = true;
  var match = $('#matchfilter').val().trim();
  if(match == 'all') {
    return tester
  } else {
    var rowteam = $(selector).find('#td-team').text().trim().toLowerCase();
    var matchHome = match.split(' @ ')[1].trim().toLowerCase();
    var matchAway = match.split(' @ ')[0].trim().toLowerCase();
    if (rowteam != matchHome && rowteam != matchAway) {
      tester = false;
    }
    return tester;
  }
}

function filterPaginationQty(i) {
  var tester = true;
  if (i >= window.paginationQty) {
    tester = false;
  }
  return tester;
}

function initializeDraft(event_length) {
  if(event_length <= 4) {
    presetDraft(event_length);
  }
  if(event_length > 4) {
    presetDraft(event_length);
  }
  // if($scope.isLogin) {
  //   var draftContest = window.localStorage.getItem("draftContest");
  //   if(draftContest) {
  //     draftContest = JSON.parse(draftContest);
  //     if(draftContest.contestId === $scope.contestId) {
  //       $scope.players_select = draftContest.listPlayerselected;
  //       $scope.draftName = draftContest.draftName;
  //       getTeamComposition();
  //       currentRem();
  //       $scope.noData.roster = false;
  //     }
  //   }
  // }
}

function presetDraft(event_length) {
  if(event_length <= 4) {
    for (var i = 0; i<1; i++) { players_select.push(lineup_forward); }
    for (var i = 0; i<3; i++) { players_select.push(lineup_midfielder); }
    for (var i = 0; i<3; i++) { players_select.push(lineup_defender); }
    goalkeeper_select.push(goalkeeper);
  }
  if(event_length > 4) {
    for (var i = 0; i<2; i++) { players_select.push(lineup_forward); }
    for (var i = 0; i<4; i++) { players_select.push(lineup_midfielder); }
    for (var i = 0; i<4; i++) { players_select.push(lineup_defender); }
    goalkeeper_select.push(goalkeeper);
  }
  // console.log($scope.players_select);
}

function synchronizeRoster() {
  players.map(function(player) {
    players_select.forEach(function(roster) {
      if( player.player_phase_id === roster.player_phase_id ) {
        player.selected = true;
      }
    });
  });
}

function selectPlayer(player) {
  var player_salary = parseFloat($(player).find('#td-salary').text().trim().replace('$','').replace(',',''))
  var player_pos = $(player).find('#td-position').text().trim()
  if (salary - player_salary < 0) {
    BootstrapDialog.show({
        title: "Message",
        message: "Sorry your salary is not enough."
    });
    return false;
  }
  if(event_length <= 4) {
    switch(player_pos) {
      case "Defender":
        addPlayer("Defender", 3, player);
        break;
      case "Midfielder":
        addPlayer("Midfielder", 3, player);
        break;
      case "Forward":
        addPlayer("Forward", 1, player);
        break;
    }
  }
  if(event_length > 4) {
    switch(player_pos) {
      case "Defender":
        addPlayer("Defender", 4, player);
        break;
      case "Midfielder":
        addPlayer("Midfielder", 4, player);
        break;
      case "Forward":
        addPlayer("Forward", 2, player);
        break;
    }
  }
}

function addPlayer(pos, max, player) {
  if (checkAvaiablePosition(pos) < max) {
    var index = findIndex($scope.players_select, 'pos', pos, 'player_phase_id', 0);
    players_select.splice(index, 1, player);
    players_select[index].selected = true;
    players.map(function(elem) {
      if(elem.player_phase_id === player.player_phase_id) {
        player.selected = true;
      }
    });
    currentRem();
    getTeamComposition();
  }else{
    BootstrapDialog.show({
      title: "Message",
      message: "Hanya bisa memilih "+ max +" "+ pos + "."
    });
  }
}

function checkAvaiablePosition(pos) {
  var posCount = 0;
  players_select.map(function(player) {
    if (player.pos === pos && player.player_phase_id != 0) {
      posCount += 1;
    }
  });
  return posCount;
}

var date = function(datetime) {
  var d = new Date(datetime);
  if(d.getHours() > 12) {
    hour = d.getHours() - 12
    ampm = "PM";
  } else if(d.getHours() == 12) {
    hour = d.getHours()
    ampm = "PM"
  } else {
    hour = d.getHours()
    ampm = "AM"
  }
  if (d.getHours() < 10) {
    hour = "0" + hour
  }
  if (d.getMinutes() < 10) {
    minute = "0" + d.getMinutes()
  } else {
    minute = d.getMinutes()
  }

  var date = d.getDate()+"/"+d.getMonth()+"/"+d.getFullYear();
  var time = hour+":"+minute+" "+ampm;

  return [date, time];
}
</script>
@endsection
