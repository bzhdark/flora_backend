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
        return true;
    }

    public function view(User $user, TypeRuche $typeRuche): bool
    {
        return $typeRuche->exploitation_id === $user->current_exploitation_id || $typeRuche->exploitation_id === null;
    }

    public function create(User $user): bool
    {
        return $user->currentRole()->peut_modifier_exploitation;
    }

    public function update(User $user, TypeRuche $typeRuche): bool
    {
        return $typeRuche->exploitation_id === $user->current_exploitation_id && $typeRuche->exploitation_id !== null;
    }

    public function delete(User $user, TypeRuche $typeRuche): bool
    {
        if (!$user->currentRole()->peut_modifier_exploitation) {
            return false;
        }
        $canDelete = $typeRuche->exploitation_id === $user->current_exploitation_id && $typeRuche->exploitation_id !== null;
        if (!$canDelete) {

            return false;
        }
        return true;
    }

    public function restore(User $user, TypeRuche $typeRuche): bool
    {
        return $typeRuche->exploitation_id === $user->current_exploitation_id && $typeRuche->exploitation_id !== null;
    }

    public function forceDelete(User $user, TypeRuche $typeRuche): bool
    {
        return $typeRuche->exploitation_id === $user->current_exploitation_id && $typeRuche->exploitation_id !== null;
    }
}
