<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function currentUser(Request $request)
    {
        $user = $request->user()->with('currentExploitation');
        return response()->json($user);
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
