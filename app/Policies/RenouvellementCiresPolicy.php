<?php

namespace App\Policies;

use App\Models\RenouvellementCires;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RenouvellementCiresPolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, RenouvellementCires $renouvellementCires): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, RenouvellementCires $renouvellementCires): bool
    {
    }

    public function delete(User $user, RenouvellementCires $renouvellementCires): bool
    {
    }

    public function restore(User $user, RenouvellementCires $renouvellementCires): bool
    {
    }

    public function forceDelete(User $user, RenouvellementCires $renouvellementCires): bool
    {
    }
}
