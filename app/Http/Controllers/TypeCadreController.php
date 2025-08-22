<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeCadreRequest;
use App\Models\TypeCadre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TypeCadreController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', TypeCadre::class);

        return TypeCadre::all();
    }

    public function store(TypeCadreRequest $request)
    {
        $this->authorize('create', TypeCadre::class);

        return TypeCadre::create($request->validated());
    }

    public function show(TypeCadre $typeCadre)
    {
        $this->authorize('view', $typeCadre);

        return $typeCadre;
    }

    public function update(TypeCadreRequest $request, TypeCadre $typeCadre)
    {
        $this->authorize('update', $typeCadre);

        $typeCadre->update($request->validated());

        return $typeCadre;
    }

    public function destroy(TypeCadre $typeCadre)
    {
        $this->authorize('delete', $typeCadre);

        $typeCadre->delete();

        return response()->json();
    }
}
