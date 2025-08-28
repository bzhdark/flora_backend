<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoucheRequest;
use App\Models\Souche;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SoucheController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Souche::class);

        return Souche::all();
    }

    public function store(SoucheRequest $request)
    {
        $this->authorize('create', Souche::class);

        return Souche::create($request->validated());
    }

    public function show(Souche $souche)
    {
        $this->authorize('view', $souche);

        return $souche;
    }

    public function update(SoucheRequest $request, Souche $souche)
    {
        $this->authorize('update', $souche);

        $souche->update($request->validated());

        return $souche;
    }

    public function destroy(Souche $souche)
    {
        $this->authorize('delete', $souche);

        $souche->delete();

        return response()->json();
    }
}
