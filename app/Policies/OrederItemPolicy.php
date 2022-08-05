<?php

namespace App\Policies;

use App\Models\OrederItem;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrederItemPolicy
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
        return Gate::allows('orederItem_access');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, OrederItem $orederItem)
    {
        return Gate::allows('orederItem_show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Gate::allows('orederItem_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, OrederItem $orederItem)
    {
        return Gate::allows('orederItem_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, OrederItem $orederItem)
    {
        return Gate::allows('orederItem_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, OrederItem $orederItem)
    {
        return Gate::allows('orederItem_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, OrederItem $orederItem)
    {
        return Gate::allows('orederItem_forcedelete');
    }
}
