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

    }

    public function view(User $user, Sirop $sirop): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Sirop $sirop): bool
    {
    }

    public function delete(User $user, Sirop $sirop): bool
    {
    }

    public function restore(User $user, Sirop $sirop): bool
    {
    }

    public function forceDelete(User $user, Sirop $sirop): bool
    {
    }
}
