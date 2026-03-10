<?php

namespace App\Http\Controllers;

use App\Actions\Roles\AssocierTousRuchersARole;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Role::class);
        $roles = Role::query()->whereExploitationId(auth()->user()->current_exploitation_id)->orderBy("nom")->get();
        return response()->json($roles);
    }

    public function store(RoleRequest $request, AssocierTousRuchersARole $associerTousRuchers)
    {
        $this->authorize('create', Role::class);
        $exploitationId = auth()->user()->current_exploitation_id;
        $role = Role::create([...$request->validated(), "exploitation_id" => $exploitationId]);
        if (!$request->input('acces_complet_ruchers')) {
            foreach ($request->input('ruchers') as $rucher) {
                $role->ruchers()->attach(
                    $rucher["rucher_id"],
                    ["peut_modifier" => $rucher["peut_modifier"], "peut_lire" => $rucher["peut_lire"]]
                );
            }
        } else {
            $associerTousRuchers->execute($exploitationId, $role);
        }
        return response()->json($role);
    }

    public function show(Role $role)
    {
        $this->authorize('view', $role);
        $role->load('ruchers');
        return response()->json($role);
    }

    public function update(RoleRequest $request, Role $role, AssocierTousRuchersARole $associerTousRuchers)
    {
        $this->authorize('update', $role);
        $exploitationId = auth()->user()->current_exploitation_id;
        $role->ruchers()->detach();
        if (!$request->input('acces_complet_ruchers')) {
            foreach ($request->input('ruchers') as $rucher) {
                $role->ruchers()->attach(
                    $rucher["rucher_id"],
                    ["peut_modifier" => $rucher["peut_modifier"], "peut_lire" => $rucher["peut_lire"]]
                );
            }
        } else {
            $associerTousRuchers->execute($exploitationId, $role);
        }
        $role->update($request->validated());
        return response()->json($role);
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        // Vérifier que le role n'a pas encore des users
        if ($role->users()->exists()) {
            info("Des users sont associés au role");
            abort(400, "Des apiculteurs sont associés à ce rôle.");
        }
        $role->delete();
        return response()->json();
    }
}
