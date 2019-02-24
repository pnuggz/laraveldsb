<?php

namespace App\Http\Controllers;

class ContestsController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('contests');
  }

}
