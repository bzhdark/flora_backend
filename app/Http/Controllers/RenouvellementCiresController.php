<?php

namespace App\Http\Controllers;

    use App\Http\Requests\RenouvellementCiresRequest;
    use App\Models\RenouvellementCires;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    class RenouvellementCiresController extends Controller {
        use AuthorizesRequests;

        public function index()
        {
        $this->authorize('viewAny', RenouvellementCires::class);

        return RenouvellementCires::all();
        }

        public function store(RenouvellementCiresRequest $request)
        {
        $this->authorize('create', RenouvellementCires::class);

        return RenouvellementCires::create($request->validated());
        }

        public function show(RenouvellementCires $renouvellementCires)
        {
        $this->authorize('view', $renouvellementCires);

        return $renouvellementCires;
        }

        public function update(RenouvellementCiresRequest $request, RenouvellementCires $renouvellementCires)
        {
        $this->authorize('update', $renouvellementCires);

        $renouvellementCires->update($request->validated());

        return $renouvellementCires;
        }

        public function destroy(RenouvellementCires $renouvellementCires)
        {
        $this->authorize('delete', $renouvellementCires);

        $renouvellementCires->delete();

        return response()->json();
        }
    }
