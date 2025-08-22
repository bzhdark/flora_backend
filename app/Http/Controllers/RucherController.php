<?php

namespace App\Http\Controllers;

use App\Http\Requests\RucherRequest;
use App\Models\Rucher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RucherController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Rucher::class);

        return Rucher::all();
    }

    public function store(RucherRequest $request)
    {
        $this->authorize('create', Rucher::class);

        return Rucher::create($request->validated());
    }

    public function show(Rucher $rucher)
    {
        $this->authorize('view', $rucher);

        return $rucher;
    }

    public function update(RucherRequest $request, Rucher $rucher)
    {
        $this->authorize('update', $rucher);

        $rucher->update($request->validated());

        return $rucher;
    }

    public function destroy(Rucher $rucher)
    {
        $this->authorize('delete', $rucher);

        $rucher->delete();

        return response()->json();
    }
}
