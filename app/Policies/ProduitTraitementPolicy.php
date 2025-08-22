<?php

namespace App\Policies;

use App\Models\ProduitTraitement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProduitTraitementPolicy
{
  use HandlesAuthorization;

  public function viewAny(User $user): bool {}

  public function view(User $user, ProduitTraitement $ProduitTraitement): bool {}

  public function create(User $user): bool {}

  public function update(User $user, ProduitTraitement $ProduitTraitement): bool {}

  public function delete(User $user, ProduitTraitement $ProduitTraitement): bool {}

  public function restore(User $user, ProduitTraitement $ProduitTraitement): bool {}

  public function forceDelete(User $user, ProduitTraitement $ProduitTraitement): bool {}
}
