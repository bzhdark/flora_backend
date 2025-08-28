<?php

namespace App\Policies;

use App\Models\PoseElement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoseElementPolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, PoseElement $poseElement): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, PoseElement $poseElement): bool
    {
    }

    public function delete(User $user, PoseElement $poseElement): bool
    {
    }

    public function restore(User $user, PoseElement $poseElement): bool
    {
    }

    public function forceDelete(User $user, PoseElement $poseElement): bool
    {
    }
}
