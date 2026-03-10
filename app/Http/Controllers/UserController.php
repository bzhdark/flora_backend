<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function currentUser()
    {
        $user = request()->user()->load('currentExploitation');
        $currentRole = $user->currentRole();

        return response()->json([...$user->toArray(), 'role' => $currentRole]);
    }

    public function index(Request $request)
    {
        $exploitation = $request->user()->currentExploitation();
        $apiculteurs = $exploitation->apiculteurs()->get();

        return response()->json($apiculteurs);
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
