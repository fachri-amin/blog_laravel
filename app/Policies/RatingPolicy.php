<?php

namespace App\Policies;

use App\Post;
use App\Rating;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function ratingOwner(User $user, Rating $rating){
        return $user->id === $rating->user_id;
    }
}
