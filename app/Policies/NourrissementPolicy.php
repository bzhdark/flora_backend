<?php

namespace App\Policies;

use App\Models\Nourrissement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NourrissementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Nourrissement $nourrissement): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Nourrissement $nourrissement): bool
    {
    }

    public function delete(User $user, Nourrissement $nourrissement): bool
    {
    }

    public function restore(User $user, Nourrissement $nourrissement): bool
    {
    }

    public function forceDelete(User $user, Nourrissement $nourrissement): bool
    {
    }
}
