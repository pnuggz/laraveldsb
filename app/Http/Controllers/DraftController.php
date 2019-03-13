<?php

namespace App\Http\Controllers;

use App\Contests;

class DraftController extends Controller {
  public function index($response) {
    $contest_id = $response;

    $contest = new Contests;
    $result = $contest->getContestDraft($contest_id);

    // return $result['players'];

    return view('draft',
      [
        'contestdetails' => $result['contestdetails'],
        'players' => $result['players'],
      ]
    );

  }
}
