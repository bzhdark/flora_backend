<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiropRequest;
use App\Models\Sirop;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SiropController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Sirop::class);

        return Sirop::all();
    }

    public function store(SiropRequest $request)
    {
        $this->authorize('create', Sirop::class);

        return Sirop::create($request->validated());
    }

    public function show(Sirop $sirop)
    {
        $this->authorize('view', $sirop);

        return $sirop;
    }

    public function update(SiropRequest $request, Sirop $sirop)
    {
        $this->authorize('update', $sirop);

        $sirop->update($request->validated());

        return $sirop;
    }

    public function destroy(Sirop $sirop)
    {
        $this->authorize('delete', $sirop);

        $sirop->delete();

        return response()->json();
    }
}
