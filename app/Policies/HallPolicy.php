<?php

namespace App\Policies;

use App\Models\Hall;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class HallPolicy
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
        return Gate::allows('hall_access');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Hall $hall)
    {
        return Gate::allows('hall_show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Gate::allows('hall_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Hall $hall)
    {
        return Gate::allows('hall_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Hall $hall)
    {
        return Gate::allows('hall_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Hall $hall)
    {
        return Gate::allows('hall_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Hall $hall)
    {
        return Gate::allows('hall_forcedelete');
    }
}
