<?php

namespace App\Policies;

use App\Models\Price;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class PricePolicy
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
        return Gate::allows('price_access');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Price $price)
    {
        return Gate::allows('price_update');
    }
}
