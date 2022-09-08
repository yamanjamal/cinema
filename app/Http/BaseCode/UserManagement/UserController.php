<?php

namespace App\Http\BaseCode\UserManagement;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ChangeRollRequest;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Notifications\ActionNotification;
use Gate;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    public $paginate=7;
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles.permissions')->where('id','!=',1)->paginate($this->paginate);
        return $this->sendResponse(UserResource::collection($users)->response()->getData(true),'Users sent sussesfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $this->authorize('count', User::class);
        return User::count();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function deactivate(User $user)
    {
        $this->authorize('deactivate', User::class);
        $user->update(['active'=>false]);
        return $this->sendResponse(new UserResource($user),'user deactivate sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function activate(User $user)
    {
        $this->authorize('activate', User::class);
        $user->update(['active'=>true]);
        return $this->sendResponse(new UserResource($user),'user activated sussesfully');
    }

    /**
     * [search description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function search(Request $request)
    {
        $users= User::
        when($request->keyword,function($query) use($request){
            $query->where('name','like',"{$request->keyword}%");
        })
        ->paginate(5);
        return $this->sendResponse(UserResource::collection($users),'Users sent sussesfully');
    }
}
