<?php

namespace App\Policies;

use App\Models\Seat;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeatPolicy
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
        return Gate::allows('seat_access');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Seat $seat)
    {
        return Gate::allows('seat_show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Gate::allows('seat_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Seat $seat)
    {
        return Gate::allows('seat_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Seat $seat)
    {
        return Gate::allows('seat_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Seat $seat)
    {
        return Gate::allows('seat_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Seat $seat)
    {
        return Gate::allows('seat_forcedelete');
    }
}
