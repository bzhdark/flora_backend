<?php

namespace App\Policies;

use App\Models\NettoyagePlancher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NettoyagePlancherPolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, NettoyagePlancher $nettoyagePlancher): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, NettoyagePlancher $nettoyagePlancher): bool
    {
    }

    public function delete(User $user, NettoyagePlancher $nettoyagePlancher): bool
    {
    }

    public function restore(User $user, NettoyagePlancher $nettoyagePlancher): bool
    {
    }

    public function forceDelete(User $user, NettoyagePlancher $nettoyagePlancher): bool
    {
    }
}
