<?php

namespace App\Http\Controllers;

use App\Http\Requests\RucherRequest;
use App\Models\Rucher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class RucherController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        // $user = $request->user();
        // $role = $user->currentRole();

        // if ($role->acces_complet_ruchers) {
        //     $ruchers = $user->currentExploitation->ruchers()->withCount("ruches")->get();
        // } else {
        //     $ruchers = $role->ruchers()->wherePivot('peut_lire', '=', true)->withCount("ruches")->get();
        // }
        // return response()->json($ruchers);
        // // $ruchers = $request->user()->currentExploitation->ruchers()->withCount("ruches")->get();

        // if ($user->ownsCurrentExploitation()) {
        //     $ruchers = $user->currentExploitation->ruchers()->withCount("ruches")->get();
        // } else {
        //     $ruchers = $user->currentRole()->ruchers()->wherePivot("peut_lire", "=", true)->withCount("ruches")->get();
        //     $roles = $user->roles()->with('ruchers')->get();
        //     $ruchers = $roles->pluck('ruchers')->flatten();
        // }
        $role = $request->user()->currentRole();
        if (!$role) {
            return response()->json([]);
        }
        $ruchers = $role->ruchers()->withCount("ruches")->get();
        return response()->json($ruchers);
    }

    public function store(RucherRequest $request)
    {
        $this->authorize('create', Rucher::class);

        return Rucher::create($request->validated());
    }

    public function show(Rucher $rucher)
    {
        $this->authorize('view', $rucher);

        return $rucher;
    }

    public function update(RucherRequest $request, Rucher $rucher)
    {
        $this->authorize('update', $rucher);

        $rucher->update($request->validated());

        return $rucher;
    }

    public function destroy(Rucher $rucher)
    {
        $this->authorize('delete', $rucher);

        $rucher->delete();

        return response()->json();
    }
}
