<?php

namespace App\Http\Controllers;

use App\Http\Requests\RucheRequest;
use App\Models\Ruche;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RucheController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Ruche::class);

        return Ruche::all();
    }

    public function store(RucheRequest $request)
    {
        $this->authorize('create', Ruche::class);

        return Ruche::create($request->validated());
    }

    public function show(Ruche $ruche)
    {
        $this->authorize('view', $ruche);

        return $ruche;
    }

    public function update(RucheRequest $request, Ruche $ruche)
    {
        $this->authorize('update', $ruche);

        $ruche->update($request->validated());

        return $ruche;
    }

    public function destroy(Ruche $ruche)
    {
        $this->authorize('delete', $ruche);

        $ruche->delete();

        return response()->json();
    }
}
