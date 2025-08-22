<?php

namespace App\Policies;

use App\Models\Exploitation;
use App\Models\Rucher;
use App\Models\User;
use App\Models\Visite;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisitePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
    }

    public function view(User $user, Visite $visite): bool
    {
    }

    public function create(User $user): bool
    {

    }

    public function update(User $user, Visite $visite): bool
    {

    }

    public function delete(User $user, Visite $visite): bool
    {
    }

    public function restore(User $user, Visite $visite): bool
    {
    }

    public function forceDelete(User $user, Visite $visite): bool
    {
    }
}
