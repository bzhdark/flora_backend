<?php

namespace App\Policies;

use App\Models\Souche;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SouchePolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Souche $souche): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Souche $souche): bool
    {
    }

    public function delete(User $user, Souche $souche): bool
    {
    }

    public function restore(User $user, Souche $souche): bool
    {
    }

    public function forceDelete(User $user, Souche $souche): bool
    {
    }
}
