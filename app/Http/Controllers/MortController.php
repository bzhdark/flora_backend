<?php

namespace App\Http\Controllers;

use App\Http\Requests\MortRequest;
use App\Models\Mort;
use App\Models\Ruche;
use App\Models\Visite;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class MortController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Mort::class);

        return Mort::all();
    }

    public function store(MortRequest $request)
    {
        $ruche = Ruche::findOrFail($request->ruche_id)->with('rucher')->first();

        info($ruche);
        $this->authorize('create', [Mort::class, $ruche->rucher]);
        $visite = DB::transaction(function () use ($request) {
            $data = $request->validated();
            $visite = Visite::create([
                'auteur_id' => $request->user()->id,
                'ruche_id' => $data["ruche_id"],
                'date' => $data['date'],
                'commentaires' => "Bla",
                "exploitation_id" => $request->user()->current_exploitation_id,

            ]);
            return Mort::create([
                'visite_id' => $visite->id,
                "commentaires" => $data["commentaires"] ?? null,
            ]);
        });
        return response()->json($visite);
    }

    public function show(Mort $mort)
    {
        $this->authorize('view', $mort);

        return $mort;
    }

    public function update(MortRequest $request, Mort $mort)
    {
        $this->authorize('update', $mort);

        $mort->update($request->validated());

        return $mort;
    }

    public function destroy(Mort $mort)
    {
        $this->authorize('delete', $mort);

        $mort->delete();

        return response()->json();
    }
}
