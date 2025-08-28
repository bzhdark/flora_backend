<?php

namespace App\Http\Controllers;

use App\Http\Requests\IntroductionRequest;
use App\Models\Introduction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IntroductionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Introduction::class);

        return Introduction::all();
    }

    public function store(IntroductionRequest $request)
    {
        $this->authorize('create', Introduction::class);

        return Introduction::create($request->validated());
    }

    public function show(Introduction $introduction)
    {
        $this->authorize('view', $introduction);

        return $introduction;
    }

    public function update(IntroductionRequest $request, Introduction $introduction)
    {
        $this->authorize('update', $introduction);

        $introduction->update($request->validated());

        return $introduction;
    }

    public function destroy(Introduction $introduction)
    {
        $this->authorize('delete', $introduction);

        $introduction->delete();

        return response()->json();
    }
}
