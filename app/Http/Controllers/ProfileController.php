<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class profilecontroller extends Controller
{

    public function info()
    {
        $user =auth()->user();
        return $this->sendResponse(new UserResource($user),'user info sussesfully');
    }

    public function mytickets()
    {
        $tickets = Ticket::with('Movie')->where('user_id',auth()->user()->id)->paginate(5);
        return $this->sendResponse(TicketResource::collection($tickets),'Ticket sent sussesfully');
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
