<?php

namespace App\Http\Controllers;

    use App\Http\Requests\ComptageRequest;
    use App\Models\Comptage;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    class ComptageController extends Controller {
        use AuthorizesRequests;

        public function index()
        {
        $this->authorize('viewAny', Comptage::class);

        return Comptage::all();
        }

        public function store(ComptageRequest $request)
        {
        $this->authorize('create', Comptage::class);

        return Comptage::create($request->validated());
        }

        public function show(Comptage $comptage)
        {
        $this->authorize('view', $comptage);

        return $comptage;
        }

        public function update(ComptageRequest $request, Comptage $comptage)
        {
        $this->authorize('update', $comptage);

        $comptage->update($request->validated());

        return $comptage;
        }

        public function destroy(Comptage $comptage)
        {
        $this->authorize('delete', $comptage);

        $comptage->delete();

        return response()->json();
        }
    }
