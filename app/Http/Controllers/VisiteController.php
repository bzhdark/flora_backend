<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisiteRequest;
use App\Models\Visite;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class VisiteController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Visite::class);

        return Visite::all();
    }

    public function store(VisiteRequest $request)
    {
        $this->authorize('create', Visite::class);

        return Visite::create($request->validated());
    }

    public function show(Visite $visite)
    {
        $this->authorize('view', $visite);

        return $visite;
    }

    public function update(VisiteRequest $request, Visite $visite)
    {
        $this->authorize('update', $visite);

        $visite->update($request->validated());

        return $visite;
    }

    public function destroy(Visite $visite)
    {
        $this->authorize('delete', $visite);

        $visite->delete();

        return response()->json();
    }
}
