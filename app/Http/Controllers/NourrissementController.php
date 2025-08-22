<?php

namespace App\Http\Controllers;

use App\Http\Requests\NourrissementRequest;
use App\Models\Nourrissement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NourrissementController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Nourrissement::class);

        return Nourrissement::all();
    }

    public function store(NourrissementRequest $request)
    {
        $this->authorize('create', Nourrissement::class);

        return Nourrissement::create($request->validated());
    }

    public function show(Nourrissement $nourrissement)
    {
        $this->authorize('view', $nourrissement);

        return $nourrissement;
    }

    public function update(NourrissementRequest $request, Nourrissement $nourrissement)
    {
        $this->authorize('update', $nourrissement);

        $nourrissement->update($request->validated());

        return $nourrissement;
    }

    public function destroy(Nourrissement $nourrissement)
    {
        $this->authorize('delete', $nourrissement);

        $nourrissement->delete();

        return response()->json();
    }
}
