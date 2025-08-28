<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReineRequest;
use App\Models\Reine;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReineController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Reine::class);

        return Reine::all();
    }

    public function store(ReineRequest $request)
    {
        $this->authorize('create', Reine::class);

        return Reine::create($request->validated());
    }

    public function show(Reine $reine)
    {
        $this->authorize('view', $reine);

        return $reine;
    }

    public function update(ReineRequest $request, Reine $reine)
    {
        $this->authorize('update', $reine);

        $reine->update($request->validated());

        return $reine;
    }

    public function destroy(Reine $reine)
    {
        $this->authorize('delete', $reine);

        $reine->delete();

        return response()->json();
    }
}
