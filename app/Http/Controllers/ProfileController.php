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
        $user =auth()->user();
        return $this->sendResponse(new UserResource($user->load(['roles.permissions'])),'user info sussesfully');
    }

    public function mytickets()
    {
        $tickets = Ticket::with('Movie')->where('user_id',auth()->user()->id)->paginate(5);
        return $this->sendResponse(TicketResource::collection($tickets),'Ticket sent sussesfully');
    } 

    public function myOrders()
    {
        $orders = auth()->user()->Orders()->get();
        return $this->sendResponse(OrderResource::collection($orders),'Ticket sent sussesfully');
    } 

    public function editprofile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());
        return $this->sendResponse(new UserResource($user),'user edited sussesfully');
    }

    public function changepassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
        if (Hash::check($request->oldpassword,$user->password)) {
            $user->update(['password' => Hash::make($request->newpassword)]);
            return $this->sendResponse(new UserResource($user),'Your password edit successfully');

             return redirect()->back()->with('success','Your password edit successfully');    
        }
        return $this->sendError('the OldPassword is wrong');
    }
}
