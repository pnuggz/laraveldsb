@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">Lobby</div>

        <div class="card-header">Leagues</div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Contest Name</th>
                <th scope="col">Sponsor</th>
                <th scope="col">Prize Money<br/>Entry Fee</th>
                <th scope="col">Max Entry<br/>Limit/User</th>
                <th scope="col">Start Date & Time</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($contests as $contest)
                <tr>
                  <td>{{ $contest->contest_name }}<br/>{{ $contest->league->league_shorthand }}</td>
                  <td>Sponsor</td>
                  <td>Prize Money <br/>{{ $contest->entry_free }}</td>
                  <td>{{ $contest->entry_max }}<br/> {{ $contest->entry_limit_register }}</td>
                  <td>{{ $contest->start_date }}<br/> {{ $contest->start_time }}</td>
                  <td><button>Enter</button></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <!-- {{ $contests->links() }} -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
