<?php

namespace App\Policies;

use App\Models\Pesee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeseePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Pesee $pesee): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Pesee $pesee): bool
    {
    }

    public function delete(User $user, Pesee $pesee): bool
    {
    }

    public function restore(User $user, Pesee $pesee): bool
    {
    }

    public function forceDelete(User $user, Pesee $pesee): bool
    {
    }
}
