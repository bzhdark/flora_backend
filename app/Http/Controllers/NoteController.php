<?php

namespace App\Http\Controllers;

    use App\Http\Requests\NoteRequest;
    use App\Models\Note;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    class NoteController extends Controller {
        use AuthorizesRequests;

        public function index()
        {
        $this->authorize('viewAny', Note::class);

        return Note::all();
        }

        public function store(NoteRequest $request)
        {
        $this->authorize('create', Note::class);

        return Note::create($request->validated());
        }

        public function show(Note $note)
        {
        $this->authorize('view', $note);

        return $note;
        }

        public function update(NoteRequest $request, Note $note)
        {
        $this->authorize('update', $note);

        $note->update($request->validated());

        return $note;
        }

        public function destroy(Note $note)
        {
        $this->authorize('delete', $note);

        $note->delete();

        return response()->json();
        }
    }
