<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransvasementRequest;
use App\Models\Transvasement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TransvasementController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Transvasement::class);

        return Transvasement::all();
    }

    public function store(TransvasementRequest $request)
    {
        $this->authorize('create', Transvasement::class);

        return Transvasement::create($request->validated());
    }

    public function show(Transvasement $transvasement)
    {
        $this->authorize('view', $transvasement);

        return $transvasement;
    }

    public function update(TransvasementRequest $request, Transvasement $transvasement)
    {
        $this->authorize('update', $transvasement);

        $transvasement->update($request->validated());

        return $transvasement;
    }

    public function destroy(Transvasement $transvasement)
    {
        $this->authorize('delete', $transvasement);

        $transvasement->delete();

        return response()->json();
    }
}
