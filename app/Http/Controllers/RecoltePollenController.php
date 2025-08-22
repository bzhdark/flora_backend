<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecoltePollenRequest;
use App\Models\RecoltePollen;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecoltePollenController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', RecoltePollen::class);

        return RecoltePollen::all();
    }

    public function store(RecoltePollenRequest $request)
    {
        $this->authorize('create', RecoltePollen::class);

        return RecoltePollen::create($request->validated());
    }

    public function show(RecoltePollen $recoltePollen)
    {
        $this->authorize('view', $recoltePollen);

        return $recoltePollen;
    }

    public function update(RecoltePollenRequest $request, RecoltePollen $recoltePollen)
    {
        $this->authorize('update', $recoltePollen);

        $recoltePollen->update($request->validated());

        return $recoltePollen;
    }

    public function destroy(RecoltePollen $recoltePollen)
    {
        $this->authorize('delete', $recoltePollen);

        $recoltePollen->delete();

        return response()->json();
    }
}
