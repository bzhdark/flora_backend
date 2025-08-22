<?php

namespace App\Policies;

use App\Models\RecoltePropolis;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecoltePropolisPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, RecoltePropolis $recoltePropolis): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, RecoltePropolis $recoltePropolis): bool
    {
    }

    public function delete(User $user, RecoltePropolis $recoltePropolis): bool
    {
    }

    public function restore(User $user, RecoltePropolis $recoltePropolis): bool
    {
    }

    public function forceDelete(User $user, RecoltePropolis $recoltePropolis): bool
    {
    }
}
