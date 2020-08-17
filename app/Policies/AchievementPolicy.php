<?php

namespace App\Policies;

use App\achievement\Achievement;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AchievementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Achievement $achievement
     * @return mixed
     */
    public function all(User $user,$achievement)
    {
        return auth()->user()->id === $achievement->user_id
            ? Response::allow()
            : Response::deny('Você não pode fazer isso');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user){
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Achievement $achievement
     * @return mixed
     */
    public function update(User $user, Achievement $achievement)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  \App\Achievement  $achievement
     * @return mixed
     */
    public function delete(User $user, Achievement $achievement)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param  \App\Achievement  $achievement
     * @return mixed
     */
    public function restore(User $user, Achievement $achievement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param  \App\Achievement  $achievement
     * @return mixed
     */
    public function forceDelete(User $user, Achievement $achievement)
    {
        //
    }
}
