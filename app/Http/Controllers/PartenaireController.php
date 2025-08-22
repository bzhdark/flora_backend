<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartenaireRequest;
use App\Models\Partenaire;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PartenaireController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Partenaire::class);

        return Partenaire::all();
    }

    public function store(PartenaireRequest $request)
    {
        $this->authorize('create', Partenaire::class);

        return Partenaire::create($request->validated());
    }

    public function show(Partenaire $partenaire)
    {
        $this->authorize('view', $partenaire);

        return $partenaire;
    }

    public function update(PartenaireRequest $request, Partenaire $partenaire)
    {
        $this->authorize('update', $partenaire);

        $partenaire->update($request->validated());

        return $partenaire;
    }

    public function destroy(Partenaire $partenaire)
    {
        $this->authorize('delete', $partenaire);

        $partenaire->delete();

        return response()->json();
    }
}
