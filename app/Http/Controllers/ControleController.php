<?php

namespace App\Http\Controllers;

    use App\Http\Requests\ControleRequest;
    use App\Models\Controle;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    class ControleController extends Controller {
        use AuthorizesRequests;

        public function index()
        {
        $this->authorize('viewAny', Controle::class);

        return Controle::all();
        }

        public function store(ControleRequest $request)
        {
        $this->authorize('create', Controle::class);

        return Controle::create($request->validated());
        }

        public function show(Controle $controle)
        {
        $this->authorize('view', $controle);

        return $controle;
        }

        public function update(ControleRequest $request, Controle $controle)
        {
        $this->authorize('update', $controle);

        $controle->update($request->validated());

        return $controle;
        }

        public function destroy(Controle $controle)
        {
        $this->authorize('delete', $controle);

        $controle->delete();

        return response()->json();
        }
    }
