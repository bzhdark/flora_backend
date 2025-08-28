<?php

namespace App\Policies;

use App\Models\Reunion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReunionPolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Reunion $reunion): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Reunion $reunion): bool
    {
    }

    public function delete(User $user, Reunion $reunion): bool
    {
    }

    public function restore(User $user, Reunion $reunion): bool
    {
    }

    public function forceDelete(User $user, Reunion $reunion): bool
    {
    }
}
