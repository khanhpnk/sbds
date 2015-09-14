<?php

namespace App\Policies;

use App\House;
use App\User;

class HousePolicy
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
     * @param  \App\House  $house
     * @return bool
     */
    public function update(User $user, House $house)
    {
        return $user->id === $house->user_id;
    }
}
