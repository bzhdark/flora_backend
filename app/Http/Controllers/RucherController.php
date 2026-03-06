<?php

namespace App\Http\Controllers;

use App\Models\Rucher;
use App\Models\Exploitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RucherRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class RucherController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
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

        $rucher = DB::transaction(function () use ($request) {
            $exploitationId = Auth::user()->current_exploitation_id;
            $exploitation = Exploitation::findOrFail($exploitationId);
            $rucher = $exploitation->ruchers()->create($request->validated());
            $roles = $exploitation->roles()->get();
            foreach ($roles as $role) {
                if ($role->acces_complet_ruchers) {
                    $rucher->roles()->attach($role->id, ["peut_modifier" => true, "peut_lire" => true]);
                }
            }
            return $rucher;
        });
        return response()->json($rucher);
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

    public function destroy(Request $request, int $rucherId)
    {
        $validated = $request->validate([
            "garder_ruches" => ["required", "boolean"],
        ]);
        $rucher = Rucher::find($rucherId);
        if (!$rucher) {
            abort(404, "Rucher introuvable.");
        }
        if (!$validated["garder_ruches"]) {
            $rucher->ruches()->delete();
            info("Suppression de toutes les ruches");
        }
        $this->authorize('delete', $rucher);
        $rucher->delete();
        return response()->json(["success" => true]);
    }

    public function getRuches(Rucher $rucher)
    {
        Gate::authorize('view', $rucher);
        $ruches = $rucher->ruches()->get();
        return response()->json($ruches);
    }
}
