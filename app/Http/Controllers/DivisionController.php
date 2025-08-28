<?php

namespace App\Http\Controllers;

    use App\Http\Requests\DivisionRequest;
    use App\Models\Division;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    class DivisionController extends Controller {
        use AuthorizesRequests;

        public function index()
        {
        $this->authorize('viewAny', Division::class);

        return Division::all();
        }

        public function store(DivisionRequest $request)
        {
        $this->authorize('create', Division::class);

        return Division::create($request->validated());
        }

        public function show(Division $division)
        {
        $this->authorize('view', $division);

        return $division;
        }

        public function update(DivisionRequest $request, Division $division)
        {
        $this->authorize('update', $division);

        $division->update($request->validated());

        return $division;
        }

        public function destroy(Division $division)
        {
        $this->authorize('delete', $division);

        $division->delete();

        return response()->json();
        }
    }
