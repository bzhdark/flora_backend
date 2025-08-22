<?php

namespace App\Http\Controllers;

use App\Http\Requests\MielleeRequest;
use App\Models\Miellee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MielleeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Miellee::class);

        return Miellee::all();
    }

    public function store(MielleeRequest $request)
    {
        $this->authorize('create', Miellee::class);

        return Miellee::create($request->validated());
    }

    public function show(Miellee $miellee)
    {
        $this->authorize('view', $miellee);

        return $miellee;
    }

    public function update(MielleeRequest $request, Miellee $miellee)
    {
        $this->authorize('update', $miellee);

        $miellee->update($request->validated());

        return $miellee;
    }

    public function destroy(Miellee $miellee)
    {
        $this->authorize('delete', $miellee);

        $miellee->delete();

        return response()->json();
    }
}
