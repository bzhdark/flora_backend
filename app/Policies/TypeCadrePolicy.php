<?php

namespace App\Policies;

use App\Models\TypeCadre;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeCadrePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, TypeCadre $typeCadre): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, TypeCadre $typeCadre): bool
    {
    }

    public function delete(User $user, TypeCadre $typeCadre): bool
    {
    }

    public function restore(User $user, TypeCadre $typeCadre): bool
    {
    }

    public function forceDelete(User $user, TypeCadre $typeCadre): bool
    {
    }
}
