<?php

namespace App\Policies;

use App\Models\Division;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Division $division): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Division $division): bool
    {
    }

    public function delete(User $user, Division $division): bool
    {
    }

    public function restore(User $user, Division $division): bool
    {
    }

    public function forceDelete(User $user, Division $division): bool
    {
    }
}
