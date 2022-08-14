<?php

namespace App\Http\BaseCode\SanctumRegisteration;

use App\Http\Controllers\BaseController;
use App\Http\Requests\SanctumRegister\LoginRequest;
use App\Http\Requests\SanctumRegister\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;
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

        $user->Account->cereate([
            'code'     => Str::random(6),
            'points'     => 0.00,
        ]);
        $user->assignRole('User');

        return $this->sendResponse(new UserResource($user),'user regsterd successfully');
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
            'user'=>$user,
            'token'=>$token,
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
        return ['message'=>'logged out'];
    }
}
