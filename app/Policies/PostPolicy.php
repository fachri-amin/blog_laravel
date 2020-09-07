<?php

namespace App\Policies;

use App\{Post, User};
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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

    public function update(User $user, Post $post){
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post){
        return $user->id === $post->user_id;
    }

    public function canRate(User $user, Post $post){

        $rated = true;

        foreach($post->ratings()->get() as $rate){
            if($rate->user_id === $user->id){
                $rated = false;
                break;
            }
            
        }
        return $rated;
    }
}
