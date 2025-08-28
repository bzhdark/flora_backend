<?php

namespace App\Policies;

use App\Models\Comptage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComptagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Comptage $comptage): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Comptage $comptage): bool
    {
    }

    public function delete(User $user, Comptage $comptage): bool
    {
    }

    public function restore(User $user, Comptage $comptage): bool
    {
    }

    public function forceDelete(User $user, Comptage $comptage): bool
    {
    }
}
