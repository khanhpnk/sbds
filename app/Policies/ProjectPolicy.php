<?php

namespace App\Policies;

use App\Profile;
use App\Project;
use App\User;

class ProjectPolicy
{
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given house can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return bool
     */
    public function update(User $user, Project $project)
    {
        return $user->id === $project->user_id;
    }
}
