<?php

namespace App\Http\Controllers;

use App\Contests;

class ContestsController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('contests');
  }

  public function details($request) {
    $contest_id = $request;

    $contests = new Contests;
    $results = $contests->getContestDetails($contest_id);

    return $results;
  }

}
