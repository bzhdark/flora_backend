<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRucheRequest;
use App\Models\TypeRuche;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TypeRucheController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', TypeRuche::class);

        return TypeRuche::all();
    }

    public function store(TypeRucheRequest $request)
    {
        $this->authorize('create', TypeRuche::class);

        return TypeRuche::create($request->validated());
    }

    public function show(TypeRuche $typeRuche)
    {
        $this->authorize('view', $typeRuche);

        return $typeRuche;
    }

    public function update(TypeRucheRequest $request, TypeRuche $typeRuche)
    {
        $this->authorize('update', $typeRuche);

        $typeRuche->update($request->validated());

        return $typeRuche;
    }

    public function destroy(TypeRuche $typeRuche)
    {
        $this->authorize('delete', $typeRuche);

        $typeRuche->delete();

        return response()->json();
    }
}
