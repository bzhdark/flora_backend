<?php

namespace App\Policies;

use App\Models\Hausse;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HaussePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Hausse $hausse): bool
    {
        return $user->current_exploitation_id === $hausse->exploitation_id;
    }

    public function create(User $user): bool
    {
        return $user->currentRole()->peut_modifier_exploitation;
    }

    public function update(User $user, Hausse $hausse): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $hausse->exploitation_id;
    }

    public function delete(User $user, Hausse $hausse): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $hausse->exploitation_id;
    }

    public function restore(User $user, Hausse $hausse): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $hausse->exploitation_id;
    }

    public function forceDelete(User $user, Hausse $hausse): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $hausse->exploitation_id;
    }
}
