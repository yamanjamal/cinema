<?php

namespace App\Policies;

use App\Models\Snack;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class SnackPolicy
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
        return Gate::allows('snack_access');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Snack $snack)
    {
        return Gate::allows('snack_show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Gate::allows('snack_create');
    } 
    
    
    /**
    * Determine whether the user can update the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\Snack  $snack
    * @return \Illuminate\Auth\Access\Response|bool
    */
   public function update(User $user, Snack $snack)
   {
       return Gate::allows('snack_update');
   }

    
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deactivate(User $user)
    {
        return Gate::allows('snack_deactivate');
    }
    
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function activate(User $user)
    {
        return Gate::allows('snack_activate');
    }
}
