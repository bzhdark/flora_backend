<?php

namespace App\Policies;

use App\Models\Reine;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReinePolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Reine $reine): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Reine $reine): bool
    {
    }

    public function delete(User $user, Reine $reine): bool
    {
    }

    public function restore(User $user, Reine $reine): bool
    {
    }

    public function forceDelete(User $user, Reine $reine): bool
    {
    }
}
