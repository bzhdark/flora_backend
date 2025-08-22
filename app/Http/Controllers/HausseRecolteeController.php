<?php

namespace App\Http\Controllers;

use App\Http\Requests\HausseRecolteeRequest;
use App\Models\HausseRecoltee;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HausseRecolteeController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', HausseRecoltee::class);

        return HausseRecoltee::all();
    }

    public function store(HausseRecolteeRequest $request)
    {
        $this->authorize('create', HausseRecoltee::class);

        return HausseRecoltee::create($request->validated());
    }

    public function show(HausseRecoltee $hausseRecoltee)
    {
        $this->authorize('view', $hausseRecoltee);

        return $hausseRecoltee;
    }

    public function update(HausseRecolteeRequest $request, HausseRecoltee $hausseRecoltee)
    {
        $this->authorize('update', $hausseRecoltee);

        $hausseRecoltee->update($request->validated());

        return $hausseRecoltee;
    }

    public function destroy(HausseRecoltee $hausseRecoltee)
    {
        $this->authorize('delete', $hausseRecoltee);

        $hausseRecoltee->delete();

        return response()->json();
    }
}
