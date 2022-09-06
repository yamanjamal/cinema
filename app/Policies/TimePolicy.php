<?php

namespace App\Policies;

use App\Models\Time;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return Gate::allows('time_access');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Gate::allows('time_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Time $time)
    {
        return Gate::allows('time_update');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deactivate(User $user)
    {
        return Gate::allows('time_deactivate');
    }
    
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function activate(User $user)
    {
        return Gate::allows('time_activate');
    }
}
