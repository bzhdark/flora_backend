<?php

namespace App\Policies;

use App\Models\RecolteGeleeRoyale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecolteGeleeRoyalePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, RecolteGeleeRoyale $recolteGeleeRoyale): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, RecolteGeleeRoyale $recolteGeleeRoyale): bool
    {
    }

    public function delete(User $user, RecolteGeleeRoyale $recolteGeleeRoyale): bool
    {
    }

    public function restore(User $user, RecolteGeleeRoyale $recolteGeleeRoyale): bool
    {
    }

    public function forceDelete(User $user, RecolteGeleeRoyale $recolteGeleeRoyale): bool
    {
    }
}
