<?php

namespace App\Http\Controllers;

use App\Models\TypeRuche;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TypeRucheRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TypeRucheController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', TypeRuche::class);
        $typesStandards = TypeRuche::query()->whereExploitationId(null)->orderBy("nom")->get();
        $typesPersonnalises = TypeRuche::query()
            ->whereExploitationId(Auth::user()->current_exploitation_id)
            ->orderBy("nom")
            ->get();
        return response()->json(["default" => $typesStandards, "custom" => $typesPersonnalises]);
    }

    public function store(TypeRucheRequest $request)
    {
        $this->authorize('create', TypeRuche::class);
        $ruche = TypeRuche::create([...$request->validated(), "exploitation_id" => Auth::user()->current_exploitation_id]);
        return response()->json($ruche);
    }

    public function show(int $typeRucheId)
    {
        $typeRuche = TypeRuche::find($typeRucheId);
        if (!$typeRuche) {
            return response()->json(["success" => false, "message" => "Type de ruche introuvable"], 404);
        }
        $this->authorize('view', $typeRuche);
        return response()->json($typeRuche);
    }

    public function update(TypeRucheRequest $request, int $typeRucheId)
    {
        info($typeRucheId);
        $typeRuche = TypeRuche::find($typeRucheId);
        if (!$typeRuche) {
            return response()->json(["success" => false, "message" => "Type de ruche introuvable"], 404);
        }
        $this->authorize('update', $typeRuche);
        $typeRuche->update($request->validated());
        return response()->json($typeRuche);
    }

    public function destroy(int $typeRucheId)
    {
        $typeRuche = TypeRuche::find($typeRucheId);
        if (!$typeRuche) {
            return response()->json(["success" => false, "message" => "Modèle de ruche non trouvé"], 404);
        }
        $this->authorize('delete', $typeRuche);
        $typeRuche->delete();
        return response()->json(["success" => true, "message" => "Modèle de ruche supprimé"]);
    }
}
