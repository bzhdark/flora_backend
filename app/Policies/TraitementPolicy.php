<?php

namespace App\Policies;

use App\Models\Traitement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TraitementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Traitement $traitement): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Traitement $traitement): bool
    {
    }

    public function delete(User $user, Traitement $traitement): bool
    {
    }

    public function restore(User $user, Traitement $traitement): bool
    {
    }

    public function forceDelete(User $user, Traitement $traitement): bool
    {
    }
}
