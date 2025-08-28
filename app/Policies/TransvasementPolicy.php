<?php

namespace App\Policies;

use App\Models\Transvasement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransvasementPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Transvasement $transvasement): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Transvasement $transvasement): bool
    {
    }

    public function delete(User $user, Transvasement $transvasement): bool
    {
    }

    public function restore(User $user, Transvasement $transvasement): bool
    {
    }

    public function forceDelete(User $user, Transvasement $transvasement): bool
    {
    }
}
