<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReunionRequest;
use App\Models\Reunion;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReunionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Reunion::class);

        return Reunion::all();
    }

    public function store(ReunionRequest $request)
    {
        $this->authorize('create', Reunion::class);

        return Reunion::create($request->validated());
    }

    public function show(Reunion $reunion)
    {
        $this->authorize('view', $reunion);

        return $reunion;
    }

    public function update(ReunionRequest $request, Reunion $reunion)
    {
        $this->authorize('update', $reunion);

        $reunion->update($request->validated());

        return $reunion;
    }

    public function destroy(Reunion $reunion)
    {
        $this->authorize('delete', $reunion);

        $reunion->delete();

        return response()->json();
    }
}
