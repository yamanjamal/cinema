<?php

namespace App\Policies;

use App\Models\Ticket;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return Gate::allows('ticket_create');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function stepOne(User $user)
    {
        return Gate::allows('ticket_stepone');
    }
    
    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function stepTwo(User $user)
    {
        return Gate::allows('ticket_steptwo');
    }
}
