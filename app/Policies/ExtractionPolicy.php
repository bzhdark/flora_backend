<?php

namespace App\Policies;

use App\Models\Extraction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExtractionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Extraction $extraction): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Extraction $extraction): bool
    {
    }

    public function delete(User $user, Extraction $extraction): bool
    {
    }

    public function restore(User $user, Extraction $extraction): bool
    {
    }

    public function forceDelete(User $user, Extraction $extraction): bool
    {
    }
}
