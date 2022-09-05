<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Http\Resources\AccountResource;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends BaseController
{
    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Account::class,'account');
    }

    public function show(Account $account)
    {
        return $this->sendResponse(new AccountResource($account),'Account shown sussesfully');
    }

    public function adminUpdate(UpdateAccountRequest $request)
    {
        $this->authorize('adminUpdate', Account::class);
        $account = Account::where('code',$request->code)->first();
        $account->update(['points'=>($account->points + $request->points)]);
        return $this->sendResponse(new AccountResource($account),'Account updated sussesfully');
    }

    public function Update(UpdateAccountRequest $request)
    {
        $distributerAccount = auth()->user()->account;
        if($distributerAccount->points > $request->points){

            $distributerAccount->update(['points'=>($distributerAccount->points - $request->points)]);

            $account = Account::where('code',$request->code)->first();
            $account->update(['points'=>($account->points + $request->points)]);
            return $this->sendResponse(new AccountResource($distributerAccount),'Account updated sussesfully');
        }
        return $this->sendError( '','Account does not have enough money',400);
    }
}
