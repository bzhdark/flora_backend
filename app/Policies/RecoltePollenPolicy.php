<?php

namespace App\Policies;

use App\Models\RecoltePollen;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecoltePollenPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, RecoltePollen $recoltePollen): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, RecoltePollen $recoltePollen): bool
    {
    }

    public function delete(User $user, RecoltePollen $recoltePollen): bool
    {
    }

    public function restore(User $user, RecoltePollen $recoltePollen): bool
    {
    }

    public function forceDelete(User $user, RecoltePollen $recoltePollen): bool
    {
    }
}
