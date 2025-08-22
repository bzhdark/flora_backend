<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeseeRequest;
use App\Models\Pesee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PeseeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Pesee::class);

        return Pesee::all();
    }

    public function store(PeseeRequest $request)
    {
        $this->authorize('create', Pesee::class);

        return Pesee::create($request->validated());
    }

    public function show(Pesee $pesee)
    {
        $this->authorize('view', $pesee);

        return $pesee;
    }

    public function update(PeseeRequest $request, Pesee $pesee)
    {
        $this->authorize('update', $pesee);

        $pesee->update($request->validated());

        return $pesee;
    }

    public function destroy(Pesee $pesee)
    {
        $this->authorize('delete', $pesee);

        $pesee->delete();

        return response()->json();
    }
}
