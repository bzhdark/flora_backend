<?php

namespace App\Policies;

use App\Models\Partenaire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartenairePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool {}

    public function view(User $user, Partenaire $partenaire): bool {}

    public function create(User $user): bool {}

    public function update(User $user, Partenaire $partenaire): bool {}

    public function delete(User $user, Partenaire $partenaire): bool {}

    public function restore(User $user, Partenaire $partenaire): bool {}

    public function forceDelete(User $user, Partenaire $partenaire): bool {}
}
