<?php

namespace App\Policies;

use App\Models\Controle;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ControlePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Controle $controle): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Controle $controle): bool
    {
    }

    public function delete(User $user, Controle $controle): bool
    {
    }

    public function restore(User $user, Controle $controle): bool
    {
    }

    public function forceDelete(User $user, Controle $controle): bool
    {
    }
}
