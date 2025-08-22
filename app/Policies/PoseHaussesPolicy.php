<?php

namespace App\Policies;

use App\Models\PoseHausses;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoseHaussesPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, PoseHausses $poseHausses): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, PoseHausses $poseHausses): bool
    {
    }

    public function delete(User $user, PoseHausses $poseHausses): bool
    {
    }

    public function restore(User $user, PoseHausses $poseHausses): bool
    {
    }

    public function forceDelete(User $user, PoseHausses $poseHausses): bool
    {
    }
}
