<?php

namespace App\Policies;

use App\Models\Cadre;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CadrePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Cadre $cadre): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Cadre $cadre): bool
    {
    }

    public function delete(User $user, Cadre $cadre): bool
    {
    }

    public function restore(User $user, Cadre $cadre): bool
    {
    }

    public function forceDelete(User $user, Cadre $cadre): bool
    {
    }
}
