<?php

namespace App\Policies;

use App\Models\Sirop;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiropPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->current_exploitation_id !== null;
    }

    public function view(User $user, Sirop $sirop): bool
    {
        return $user->current_exploitation_id === $sirop->exploitation_id;
    }

    public function create(User $user): bool
    {
        $role = $user->currentRole();
        return $role->peut_modifier_exploitation;
    }

    public function update(User $user, Sirop $sirop): bool
    {
        $role = $user->currentRole();
        return $role->peut_modifier_exploitation && $user->current_exploitation_id === $sirop->exploitation_id;
    }

    public function delete(User $user, Sirop $sirop): bool
    {
        $role = $user->currentRole();
        return $role->peut_modifier_exploitation && $user->current_exploitation_id === $sirop->exploitation_id;
    }

    public function restore(User $user, Sirop $sirop): bool
    {
        $role = $user->currentRole();
        return $role->peut_modifier_exploitation && $user->current_exploitation_id === $sirop->exploitation_id;
    }

    public function forceDelete(User $user, Sirop $sirop): bool
    {
        $role = $user->currentRole();
        return $role->peut_modifier_exploitation && $user->current_exploitation_id === $sirop->exploitation_id;
    }
}
