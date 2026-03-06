<?php

namespace App\Http\Controllers;

use App\Http\Requests\MielleeRequest;
use App\Models\Miellee;
use App\Models\RecolteMiel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MielleeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Miellee::class);
        $miellees = Miellee::query()
            ->whereExploitationId(auth()->user()->current_exploitation_id)
            ->orderBy("nom")
            ->get();
        return response()->json($miellees);
    }

    public function store(MielleeRequest $request)
    {
        $this->authorize('create', Miellee::class);

        $miellee = Miellee::create([
            ...$request->validated(),
            "exploitation_id" => auth()->user()->current_exploitation_id
        ]);
        return response()->json($miellee);
    }

    public function show(Miellee $miellee)
    {
        $this->authorize('view', $miellee);
        return response()->json($miellee);
    }

    public function update(MielleeRequest $request, Miellee $miellee)
    {
        $this->authorize('update', $miellee);
        $miellee->update($request->validated());
        return response()->json($miellee);
    }

    public function destroy(Miellee $miellee)
    {
        $this->authorize('delete', $miellee);
        $recolte = RecolteMiel::whereMielleeId($miellee->id)->first();
        if ($recolte) {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Impossible de supprimer la miellée car des récoltes lui ont déjà été associées"
                ],
                403
            );
        }
        $miellee->delete();
        return response()->json(["success" => true, "message" => "Miellée supprimée"]);
    }
}
