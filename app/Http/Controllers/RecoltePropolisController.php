<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecoltePropolisRequest;
use App\Models\RecoltePropolis;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecoltePropolisController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', RecoltePropolis::class);

        return RecoltePropolis::all();
    }

    public function store(RecoltePropolisRequest $request)
    {
        $this->authorize('create', RecoltePropolis::class);

        return RecoltePropolis::create($request->validated());
    }

    public function show(RecoltePropolis $recoltePropolis)
    {
        $this->authorize('view', $recoltePropolis);

        return $recoltePropolis;
    }

    public function update(RecoltePropolisRequest $request, RecoltePropolis $recoltePropolis)
    {
        $this->authorize('update', $recoltePropolis);

        $recoltePropolis->update($request->validated());

        return $recoltePropolis;
    }

    public function destroy(RecoltePropolis $recoltePropolis)
    {
        $this->authorize('delete', $recoltePropolis);

        $recoltePropolis->delete();

        return response()->json();
    }
}
