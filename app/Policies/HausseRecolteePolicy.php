<?php

namespace App\Policies;

use App\Models\HausseRecoltee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HausseRecolteePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, HausseRecoltee $hausseRecoltee): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, HausseRecoltee $hausseRecoltee): bool
    {
    }

    public function delete(User $user, HausseRecoltee $hausseRecoltee): bool
    {
    }

    public function restore(User $user, HausseRecoltee $hausseRecoltee): bool
    {
    }

    public function forceDelete(User $user, HausseRecoltee $hausseRecoltee): bool
    {
    }
}
