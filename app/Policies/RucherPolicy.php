<?php

namespace App\Policies;

use App\Models\Rucher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RucherPolicy
{
  use HandlesAuthorization;

  public function viewAny(User $user): bool {}

  public function view(User $user, Rucher $rucher): bool
  {
    return $user->canViewRucher($rucher);
  }

  public function create(User $user): bool
  {
    return $user->currentRole()->peut_creer_ruchers;
  }

  public function update(User $user, Rucher $rucher): bool
  {
    return $user->canEditRucher($rucher);
  }

  public function delete(User $user, Rucher $rucher): bool
  {
    return  $user->currentRole()->peut_creer_ruchers;
  }

  public function restore(User $user, Rucher $rucher): bool {}

  public function forceDelete(User $user, Rucher $rucher): bool {}
}
