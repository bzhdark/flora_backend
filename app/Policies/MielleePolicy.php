<?php

namespace App\Policies;

use App\Models\Miellee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MielleePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Miellee $miellee): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Miellee $miellee): bool
    {
    }

    public function delete(User $user, Miellee $miellee): bool
    {
    }

    public function restore(User $user, Miellee $miellee): bool
    {
    }

    public function forceDelete(User $user, Miellee $miellee): bool
    {
    }
}
