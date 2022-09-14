<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\OrderResource;
use App\Http\Resources\TicketResource;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;

class profilecontroller extends BaseController
{
    public function info()
    {
        $this->authorize('info', User::class);
        $user =auth()->user();
        return $this->sendResponse(new UserResource($user->load(['roles.permissions','Account'])),'user info sussesfully');
    }

    public function mytickets()
    {
        $this->authorize('mytickets', User::class);
        $tickets = Ticket::with('Movie')->where('user_id',auth()->user()->id)->paginate(3);
        return $this->sendResponse(TicketResource::collection($tickets)->response()->getData(true),'Ticket sent sussesfully');
    } 

    public function myOrders()
    {
        $this->authorize('myOrders', User::class);
        $orders = auth()->user()->Orders()->paginate(3);
        return $this->sendResponse(OrderResource::collection($orders)->response()->getData(true),'Order sent sussesfully');
    } 

    public function editprofile(UpdateProfileRequest $request)
    {
        $this->authorize('editprofile', User::class);
        $user = auth()->user();
        $user->update($request->validated());
        return $this->sendResponse(new UserResource($user),'user edited sussesfully');
    }

    public function changepassword(ChangePasswordRequest $request)
    {
        $this->authorize('changepassword', User::class);
        $user = auth()->user();
        if (Hash::check($request->oldpassword,$user->password)) {
            $user->update(['password' => Hash::make($request->newpassword)]);
            return $this->sendResponse(new UserResource($user),'Your password edit successfully');

             return redirect()->back()->with('success','Your password edit successfully');    
        }
        return $this->sendError('the OldPassword is wrong');
    }
}
