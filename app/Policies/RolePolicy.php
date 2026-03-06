<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        $role = $user->currentRole();
        if (!$role) {
            return false;
        }
        return $user->current_exploitation_id != null && $role->peut_gerer_roles;
    }

    public function view(User $user, Role $role): bool
    {
        $role = $user->currentRole();
        if (!$role) {
            return false;
        }
        return $user->current_exploitation_id != null &&
            $role->peut_gerer_roles &&
            $role->exploitation_id == $user->current_exploitation_id;
    }

    public function create(User $user): bool
    {
        $role = $user->currentRole();
        if (!$role) {
            return false;
        }
        return $user->current_exploitation_id != null && $role->peut_gerer_roles;
    }

    public function update(User $user, Role $role): bool
    {
        $role = $user->currentRole();
        if (!$role) {
            return false;
        }
        return $user->current_exploitation_id != null &&
            $role->peut_gerer_roles &&
            $role->exploitation_id == $user->current_exploitation_id;
    }

    public function delete(User $user, Role $role): bool
    {
        $role = $user->currentRole();
        if (!$role) {
            return false;
        }
        return $user->current_exploitation_id != null &&
            $role->peut_gerer_roles &&
            $role->exploitation_id == $user->current_exploitation_id;
    }

    public function restore(User $user, Role $role): bool
    {
        $role = $user->currentRole();
        if (!$role) {
            return false;
        }
        return $user->current_exploitation_id != null &&
            $role->peut_gerer_roles &&
            $role->exploitation_id == $user->current_exploitation_id;
    }

    public function forceDelete(User $user, Role $role): bool
    {
        $role = $user->currentRole();
        if (!$role) {
            return false;
        }
        return $user->current_exploitation_id != null &&
            $role->peut_gerer_roles &&
            $role->exploitation_id == $user->current_exploitation_id;
    }
}
