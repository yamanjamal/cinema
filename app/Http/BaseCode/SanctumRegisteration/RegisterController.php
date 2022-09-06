<?php

namespace App\Http\BaseCode\SanctumRegisteration;

use App\Http\Controllers\BaseController;
use App\Http\Requests\SanctumRegister\LoginRequest;
use App\Http\Requests\SanctumRegister\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Str;

class RegisterController extends BaseController
{
    /**
     * [register description]
     * @param  RegisterRequest $request     [description]
     * @param       [description]
     * @return [type]                       [description]
     */
    public function register(RegisterRequest $request)
    {
        $input=$request->validated();
        $image = $request->file('id_img');
        $imgname=time().$image->getClientOriginalName();
        $img = Image::make($request->id_img);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'phone'    => $request->phone,
                'id_img'   => 'upload/Imgs/'.$imgname,
            ]);
        $account = Account::create([
            'code'     => Str::random(6),
            'user_id'     => $user->id,
            'points'     => 0.00,
        ]);
        if($request->role){
            $user->assignRole($request->role);
        }else{
            $user->assignRole('User');
        }

        return $this->sendResponse(new UserResource($user->load('Account')),'user registerd successfully');
    }

    /**
     * 
     * @param  LoginRequest $request     [description]
     * @param    [description]
     * @return [type]                    [description]
     */
    public function login(LoginRequest $request ){
       
        $user=User::where('email',$request->email )->first();
        if (!$user) {
            return $this->sendError('thier is no such email');
        }

        if (!Hash::check($request->password ,$user->password)) {
            return $this->sendError('Incorrect password');
        }

        $token['token']=$user->createtoken('cinema,project')->plainTextToken;

        $response=[
            'token'=>$token,
            'user'=>$this->sendResponse(new UserResource($user->load('Account','roles.permissions')),'user registerd successfully'),
        ];
        return $this->sendResponse($response,'you logged in congrats');
    }

    /**
     * [logout description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function logout(){
       
        auth()->user()->tokens()->delete();
         return response()->json(['message' => 'logged out'], 200);
    }
}