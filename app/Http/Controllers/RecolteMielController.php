<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecolteMielRequest;
use App\Models\RecolteMiel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecolteMielController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', RecolteMiel::class);

        return RecolteMiel::all();
    }

    public function store(RecolteMielRequest $request)
    {
        $this->authorize('create', RecolteMiel::class);

        return RecolteMiel::create($request->validated());
    }

    public function show(RecolteMiel $recolteMiel)
    {
        $this->authorize('view', $recolteMiel);

        return $recolteMiel;
    }

    public function update(RecolteMielRequest $request, RecolteMiel $recolteMiel)
    {
        $this->authorize('update', $recolteMiel);

        $recolteMiel->update($request->validated());

        return $recolteMiel;
    }

    public function destroy(RecolteMiel $recolteMiel)
    {
        $this->authorize('delete', $recolteMiel);

        $recolteMiel->delete();

        return response()->json();
    }
}
