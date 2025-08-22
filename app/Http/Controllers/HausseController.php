<?php

namespace App\Http\Controllers;

use App\Http\Requests\HausseRequest;
use App\Models\Hausse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HausseController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Hausse::class);

        return Hausse::all();
    }

    public function store(HausseRequest $request)
    {
        $this->authorize('create', Hausse::class);

        return Hausse::create($request->validated());
    }

    public function show(Hausse $hausse)
    {
        $this->authorize('view', $hausse);

        return $hausse;
    }

    public function update(HausseRequest $request, Hausse $hausse)
    {
        $this->authorize('update', $hausse);

        $hausse->update($request->validated());

        return $hausse;
    }

    public function destroy(Hausse $hausse)
    {
        $this->authorize('delete', $hausse);

        $hausse->delete();

        return response()->json();
    }
}
