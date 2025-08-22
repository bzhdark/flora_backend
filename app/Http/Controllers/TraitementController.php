<?php

namespace App\Http\Controllers;

use App\Http\Requests\TraitementRequest;
use App\Models\Traitement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TraitementController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Traitement::class);

        return Traitement::all();
    }

    public function store(TraitementRequest $request)
    {
        $this->authorize('create', Traitement::class);

        return Traitement::create($request->validated());
    }

    public function show(Traitement $traitement)
    {
        $this->authorize('view', $traitement);

        return $traitement;
    }

    public function update(TraitementRequest $request, Traitement $traitement)
    {
        $this->authorize('update', $traitement);

        $traitement->update($request->validated());

        return $traitement;
    }

    public function destroy(Traitement $traitement)
    {
        $this->authorize('delete', $traitement);

        $traitement->delete();

        return response()->json();
    }
}
