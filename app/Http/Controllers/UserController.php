<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function currentUser()
  {
    info("Fetching current user");
    $user = request()->user()->load('currentExploitation');
    $currentRole = $user->currentRole();
    return response()->json([...$user->toArray(), "role" => $currentRole]);
  }

  public function index() {}

  public function store(Request $request) {}

  public function show($id) {}

  public function update(Request $request, $id) {}

  public function destroy($id) {}
}
