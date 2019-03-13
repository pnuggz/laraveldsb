@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <h3 class="card-header text-center">Lobby</h3>

        <div class="card-body">
          <div class="scrolling-wrapper-flexbox" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
            <div class="card text-center" style="width: calc(33.33% - 10px); flex: 0 0 auto; padding: 10px; margin: 0px 5px;">
              <h2 class="align-middle" style="margin: 0">All</h2>
            </div>
            <div class="card text-center" style="width: calc(33.33% - 10px); flex: 0 0 auto; padding: 10px; margin: 0px 5px;">
              <h2 class="align-middle" style="margin: 0">Premier League</h2>
            </div>
            <div class="card text-center" style="width: calc(33.33% - 10px); flex: 0 0 auto; padding: 10px; margin: 0px 5px;">
              <h2 class="align-middle" style="margin: 0">Champions League</h2>
            </div>
            <div class="card text-center" style="width: calc(33.33% - 10px); flex: 0 0 auto; padding: 10px; margin: 0px 5px;">
              <h2 class="align-middle" style="margin: 0">Bundesliga</h2>
            </div>
          </div>
        </div>

        <h3 class="card-header text-center">Contests</h3>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Contest Name</th>
                <th scope="col">Sponsor</th>
                <th scope="col">Prize Money<br/>Entry Fee</th>
                <th scope="col">Limit/User<br/>Max Entry</th>
                <th scope="col">Start Date & Time</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($contests as $contest)
                <tr>
                  <td data-toggle="modal" data-target="#contestDetailsModal" contest_id="{{$contest->id}}">{{ $contest->contest_name }}<br/>{{ $contest->leagues->league_shorthand }}</td>
                  <td>Sponsor</td>
                  <td>Prize Money <br/>{{ $contest->entry_free }}</td>
                  <td>{{ $contest->user_entry_count }}/{{ $contest->entry_limit_register }}<br/>{{$contest->total_entry_count}}/{{ $contest->entry_max }}</td>
                  <td>{{ $contest->start_date }}<br/> {{ $contest->start_time }}</td>
                  <td><button>Enter</button></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $contests->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@include('modals.contestDetailsModal');
<script>
$(function() {
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


});

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
