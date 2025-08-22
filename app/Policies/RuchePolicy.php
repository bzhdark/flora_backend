<?php

namespace App\Policies;

use App\Models\Ruche;
use App\Models\Rucher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RuchePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
    }

    public function view(User $user, Ruche $ruche): bool
    {
    }

    public function create(User $user): bool
    {
        return $user->roles()->where('peut_creer_ruches', true)->exists();
    }

    public function update(User $user, Ruche $ruche): bool
    {
        $rucher = $ruche->rucher;
        return $user->canEditRucher($rucher);
    }

    public function delete(User $user, Ruche $ruche): bool
    {
        $rucher = $ruche->rucher;
        return $user->canEditRucher($rucher);
    }

    public function restore(User $user, Ruche $ruche): bool
    {
    }

    public function forceDelete(User $user, Ruche $ruche): bool
    {
    }
}
