<?php

namespace App\Http\Controllers;

use App\Http\Requests\NettoyagePlancherRequest;
use App\Models\NettoyagePlancher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NettoyagePlancherController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', NettoyagePlancher::class);

        return NettoyagePlancher::all();
    }

    public function store(NettoyagePlancherRequest $request)
    {
        $this->authorize('create', NettoyagePlancher::class);

        return NettoyagePlancher::create($request->validated());
    }

    public function show(NettoyagePlancher $nettoyagePlancher)
    {
        $this->authorize('view', $nettoyagePlancher);

        return $nettoyagePlancher;
    }

    public function update(NettoyagePlancherRequest $request, NettoyagePlancher $nettoyagePlancher)
    {
        $this->authorize('update', $nettoyagePlancher);

        $nettoyagePlancher->update($request->validated());

        return $nettoyagePlancher;
    }

    public function destroy(NettoyagePlancher $nettoyagePlancher)
    {
        $this->authorize('delete', $nettoyagePlancher);

        $nettoyagePlancher->delete();

        return response()->json();
    }
}
