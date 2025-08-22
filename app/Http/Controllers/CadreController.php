<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadreRequest;
use App\Models\Cadre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CadreController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Cadre::class);

        return Cadre::all();
    }

    public function store(CadreRequest $request)
    {
        $this->authorize('create', Cadre::class);

        return Cadre::create($request->validated());
    }

    public function show(Cadre $cadre)
    {
        $this->authorize('view', $cadre);

        return $cadre;
    }

    public function update(CadreRequest $request, Cadre $cadre)
    {
        $this->authorize('update', $cadre);

        $cadre->update($request->validated());

        return $cadre;
    }

    public function destroy(Cadre $cadre)
    {
        $this->authorize('delete', $cadre);

        $cadre->delete();

        return response()->json();
    }
}
