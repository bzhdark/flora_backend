<?php

namespace App\Policies;

use App\Models\RecolteMiel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecolteMielPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, RecolteMiel $recolteMiel): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, RecolteMiel $recolteMiel): bool
    {
    }

    public function delete(User $user, RecolteMiel $recolteMiel): bool
    {
    }

    public function restore(User $user, RecolteMiel $recolteMiel): bool
    {
    }

    public function forceDelete(User $user, RecolteMiel $recolteMiel): bool
    {
    }
}
