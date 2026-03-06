<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHausseBulkRequest;
use App\Http\Requests\HausseRequest;
use App\Models\Hausse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HausseController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request): JsonResponse
    {
        $this->authorize('viewAny', Hausse::class);
        $exploitationId = $request->user()->current_exploitation_id;
        $hausses = Hausse::query()
            ->whereExploitationId($exploitationId)
            ->with('ruche')
            ->orderBy('reference')
            ->get();

        return response()->json($hausses);
    }

    public function store(HausseRequest $request): JsonResponse
    {
        $this->authorize('create', Hausse::class);
        $hausse = Hausse::create([...$request->validated(), 'exploitation_id' => $request->user()->current_exploitation_id]);

        return response()->json($hausse);
    }

    public function show(Hausse $hausse): JsonResponse
    {
        $this->authorize('view', $hausse);
        $hausse->load('ruche');

        return response()->json($hausse);
    }

    public function update(HausseRequest $request, Hausse $hausse): JsonResponse
    {
        $this->authorize('update', $hausse);
        $hausse->update($request->validated());
        $hausse->load('ruche');

        return response()->json($hausse);
    }

    public function destroy(Hausse $hausse): JsonResponse
    {
        $this->authorize('delete', $hausse);
        $ruche = $hausse->ruche;
        if ($ruche) {
            return response()->json([
                'success' => false,
                'message' => 'Impossible de supprimer la hausse car elle est associée à une ruche',
            ], 403);
        }
        $hausse->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hausse supprimée avec succès',
        ]);
    }

    public function createMany(CreateHausseBulkRequest $request): JsonResponse
    {
        $this->authorize('create', Hausse::class);
        $validated = $request->validated();
        $prefix = $validated['prefixe'];
        $suffix = $validated['suffixe'];
        $numeroDepart = $validated['numero_depart'];

        $haussesACreer = [];
        $exploitationId = $request->user()->current_exploitation_id;

        for ($i = 0; $i < $validated['nb_a_creer']; $i++) {
            $haussesACreer[] = [
                'reference' => $prefix.$numeroDepart + $i.$suffix,
                'taux_remplissage' => 0,
                'ruche_id' => null,
                'exploitation_id' => $exploitationId,
            ];
        }
        Hausse::insert($haussesACreer);

        return response()->json([
            'success' => true,
            'message' => 'Hausses créées avec succès',
        ]);
    }
}
