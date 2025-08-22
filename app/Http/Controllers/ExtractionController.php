<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtractionRequest;
use App\Models\Extraction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ExtractionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Extraction::class);

        return Extraction::all();
    }

    public function store(ExtractionRequest $request)
    {
        $this->authorize('create', Extraction::class);

        return Extraction::create($request->validated());
    }

    public function show(Extraction $extraction)
    {
        $this->authorize('view', $extraction);

        return $extraction;
    }

    public function update(ExtractionRequest $request, Extraction $extraction)
    {
        $this->authorize('update', $extraction);

        $extraction->update($request->validated());

        return $extraction;
    }

    public function destroy(Extraction $extraction)
    {
        $this->authorize('delete', $extraction);

        $extraction->delete();

        return response()->json();
    }
}
