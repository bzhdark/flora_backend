<?php

namespace App\Policies;

use App\Models\Mort;
use App\Models\Rucher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MortPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Mort $mort): bool
    {
    }

    public function create(User $user, Rucher $rucher): bool
    {
        return $user->canEditRucher($rucher);
    }

    public function update(User $user, Mort $mort): bool
    {
    }

    public function delete(User $user, Mort $mort): bool
    {
    }

    public function restore(User $user, Mort $mort): bool
    {
    }

    public function forceDelete(User $user, Mort $mort): bool
    {
    }
}
