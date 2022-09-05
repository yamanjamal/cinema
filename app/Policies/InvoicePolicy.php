<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function myinvoices(User $user)
    {
        return Gate::allows('invoice_access');
    }
}
