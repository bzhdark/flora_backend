<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecolteGeleeRoyaleRequest;
use App\Models\RecolteGeleeRoyale;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecolteGeleeRoyaleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', RecolteGeleeRoyale::class);

        return RecolteGeleeRoyale::all();
    }

    public function store(RecolteGeleeRoyaleRequest $request)
    {
        $this->authorize('create', RecolteGeleeRoyale::class);

        return RecolteGeleeRoyale::create($request->validated());
    }

    public function show(RecolteGeleeRoyale $recolteGeleeRoyale)
    {
        $this->authorize('view', $recolteGeleeRoyale);

        return $recolteGeleeRoyale;
    }

    public function update(RecolteGeleeRoyaleRequest $request, RecolteGeleeRoyale $recolteGeleeRoyale)
    {
        $this->authorize('update', $recolteGeleeRoyale);

        $recolteGeleeRoyale->update($request->validated());

        return $recolteGeleeRoyale;
    }

    public function destroy(RecolteGeleeRoyale $recolteGeleeRoyale)
    {
        $this->authorize('delete', $recolteGeleeRoyale);

        $recolteGeleeRoyale->delete();

        return response()->json();
    }
}
