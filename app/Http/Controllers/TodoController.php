<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Todo::class);
        return Todo::all();
    }

    public function store(TodoRequest $request)
    {
        $this->authorize('create', Todo::class);

        return Todo::create($request->validated());
    }

    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);

        return $todo;
    }

    public function update(TodoRequest $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $todo->update($request->validated());

        return $todo;
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);

        $todo->delete();

        return response()->json();
    }
}
