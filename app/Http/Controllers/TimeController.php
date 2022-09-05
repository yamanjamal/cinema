<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimeResource;
use App\Models\Time;
use App\Http\Requests\StoreTimeRequest;
use App\Http\Requests\UpdateTimeRequest;

class TimeController extends BaseController
{

    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Time::class,'time');
    }

   
    public function index()
    {
        $times = Time::paginate($this->paginate);
        return $this->sendResponse(TimeResource::collection($times)->response()->getData(true),'Times sent sussesfully');
    }

    
    public function store(StoreTimeRequest $request)
    {
        $time = Time::create($request->validated());
        return $this->sendResponse(new TimeResource($time ),'Time created sussesfully');
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeRequest  $request
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        return $this->sendResponse(new TimeResource($time),'Time sent sussesfully');
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeRequest  $request
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeRequest $request, Time $time)
    {
        $time->update($request->validated());
        return $this->sendResponse(new TimeResource($time),'Time updated sussesfully');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\time  $user
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Time $time)
    {
        $this->authorize('deactivate', Time::class);
        $time->update(['active'=>false]);
        return $this->sendResponse(new TimeResource($time),'Time deactivate sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\time  $user
     * @return \Illuminate\Http\Response
     */
    public function activate(Time $time)
    {
        $this->authorize('activate', Time::class);
        $time->update(['active'=>true]);
        return $this->sendResponse(new TimeResource($time),'Time activated sussesfully');
    }
}