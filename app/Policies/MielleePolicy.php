<?php

namespace App\Policies;

use App\Models\Miellee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MielleePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Miellee $miellee): bool
    {
        return $user->current_exploitation_id === $miellee->exploitation_id;
    }

    public function create(User $user): bool
    {
        return $user->currentRole()->peut_modifier_exploitation;
    }

    public function update(User $user, Miellee $miellee): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $miellee->exploitation_id;
    }

    public function delete(User $user, Miellee $miellee): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $miellee->exploitation_id;
    }

    public function restore(User $user, Miellee $miellee): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $miellee->exploitation_id;
    }

    public function forceDelete(User $user, Miellee $miellee): bool
    {
        return $user->currentRole(
            )->peut_modifier_exploitation && $user->current_exploitation_id === $miellee->exploitation_id;
    }
}
