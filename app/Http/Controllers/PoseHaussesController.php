<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoseHaussesRequest;
use App\Models\PoseHausses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PoseHaussesController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', PoseHausses::class);

        return PoseHausses::all();
    }

    public function store(PoseHaussesRequest $request)
    {
        $this->authorize('create', PoseHausses::class);

        return PoseHausses::create($request->validated());
    }

    public function show(PoseHausses $poseHausses)
    {
        $this->authorize('view', $poseHausses);

        return $poseHausses;
    }

    public function update(PoseHaussesRequest $request, PoseHausses $poseHausses)
    {
        $this->authorize('update', $poseHausses);

        $poseHausses->update($request->validated());

        return $poseHausses;
    }

    public function destroy(PoseHausses $poseHausses)
    {
        $this->authorize('delete', $poseHausses);

        $poseHausses->delete();

        return response()->json();
    }
}
