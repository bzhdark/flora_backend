<?php

namespace App\Policies;

use App\Models\Hausse;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HaussePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Hausse $hausse): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Hausse $hausse): bool
    {
    }

    public function delete(User $user, Hausse $hausse): bool
    {
    }

    public function restore(User $user, Hausse $hausse): bool
    {
    }

    public function forceDelete(User $user, Hausse $hausse): bool
    {
    }
}
