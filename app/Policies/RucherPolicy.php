<?php

namespace App\Policies;

use App\Models\Rucher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RucherPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
    }

    public function view(User $user, Rucher $rucher): bool
    {
    }

    public function create(User $user): bool
    {

    }

    public function update(User $user, Rucher $rucher): bool
    {
        // L'apiculteur doit faire partie de l'exploitation du rucher
        if ($user->current_exploitation_id !== $rucher->exploitation_id) {
            return false;
        }
        // Si superadmin, autoriser direct
        if ($user->ownsCurrentExploitation()) {
            return true;
        }

        // L'apiculteur doit etre autorisé à intervenir sur le rucher
        $roles = $user->roles()->with('ruchers')->get();
        $ruchers_id = $roles->pluck('ruchers')->flatten()->pluck('id');
        if ($ruchers_id->contains($rucher->id)) {
            return true;
        }
        return false;
    }

    public function delete(User $user, Rucher $rucher): bool
    {
    }

    public function restore(User $user, Rucher $rucher): bool
    {
    }

    public function forceDelete(User $user, Rucher $rucher): bool
    {
    }
}
