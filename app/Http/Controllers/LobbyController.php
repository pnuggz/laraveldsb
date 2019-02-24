<?php

namespace App\Http\Controllers;

use App\Contests;
use App\Lobby;
use Illuminate\Http\Request;

class LobbyController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    // $contests = Contests::active()->with('league')->paginate(10);
    $contests = Contests::contestsWithUserEntry();

    // return view('lobby', ['contests' => $contests]);
    return $contests;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Lobby  $lobby
   * @return \Illuminate\Http\Response
   */
  public function show(Lobby $lobby) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Lobby  $lobby
   * @return \Illuminate\Http\Response
   */
  public function edit(Lobby $lobby) {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Lobby  $lobby
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Lobby $lobby) {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Lobby  $lobby
   * @return \Illuminate\Http\Response
   */
  public function destroy(Lobby $lobby) {
    //
  }
}
