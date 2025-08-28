<?php

namespace App\Policies;

use App\Models\Introduction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntroductionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Introduction $introduction): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Introduction $introduction): bool
    {
    }

    public function delete(User $user, Introduction $introduction): bool
    {
    }

    public function restore(User $user, Introduction $introduction): bool
    {
    }

    public function forceDelete(User $user, Introduction $introduction): bool
    {
    }
}
