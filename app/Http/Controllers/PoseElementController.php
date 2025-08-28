<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoseElementRequest;
use App\Models\PoseElement;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PoseElementController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', PoseElement::class);

        return PoseElement::all();
    }

    public function store(PoseElementRequest $request)
    {
        $this->authorize('create', PoseElement::class);

        return PoseElement::create($request->validated());
    }

    public function show(PoseElement $poseElement)
    {
        $this->authorize('view', $poseElement);

        return $poseElement;
    }

    public function update(PoseElementRequest $request, PoseElement $poseElement)
    {
        $this->authorize('update', $poseElement);

        $poseElement->update($request->validated());

        return $poseElement;
    }

    public function destroy(PoseElement $poseElement)
    {
        $this->authorize('delete', $poseElement);

        $poseElement->delete();

        return response()->json();
    }
}
