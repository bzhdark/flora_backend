<?php

namespace App\Http\Controllers;

use App\Models\Sirop;
use App\Http\Requests\SiropRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SiropController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Sirop::class);
        $exploitationId = Auth::user()->current_exploitation_id;
        $sirops = Sirop::query()->whereExploitationId($exploitationId)->orderBy("pourcentage_sucre")->get();
        return response()->json($sirops);
    }

    public function store(SiropRequest $request)
    {
        $this->authorize('create', Sirop::class);
        $sirop = Sirop::create([
            ...$request->validated(),
            "pourcentage_sucre" => round($request->pourcentage_sucre),
            "exploitation_id" => Auth::user()->current_exploitation_id
        ]);
        return response()->json($sirop);
    }

    public function show(Sirop $sirop)
    {
        $this->authorize('view', $sirop);
        return response()->json($sirop);
    }

    public function update(SiropRequest $request, Sirop $sirop)
    {
        $this->authorize('update', $sirop);
        $sirop->update([
            ...$request->validated(),
            "pourcentage_sucre" => round($request->pourcentage_sucre),
        ]);
        return response()->json($sirop);
    }

    public function destroy(Sirop $sirop)
    {
        $this->authorize('delete', $sirop);
        $sirop->delete();
        return response()->json();
    }

    public function nombreNourrissements(Sirop $sirop)
    {
        $nb = $sirop->nourrissements()->count();
        return response()->json($nb);
    }
}
