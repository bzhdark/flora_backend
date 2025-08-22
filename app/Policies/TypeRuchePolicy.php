<?php

namespace App\Policies;

use App\Models\TypeRuche;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeRuchePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, TypeRuche $typeRuche): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, TypeRuche $typeRuche): bool
    {
    }

    public function delete(User $user, TypeRuche $typeRuche): bool
    {
    }

    public function restore(User $user, TypeRuche $typeRuche): bool
    {
    }

    public function forceDelete(User $user, TypeRuche $typeRuche): bool
    {
    }
}
