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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::paginate($this->paginate);
        return $this->sendResponse(TimeResource::collection($times)->response()->getData(true),'Times sent sussesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeRequest $request)
    {
        $time = Time::create($request->validated());
        return $this->sendResponse(new TimeResource($time ),'Time created sussesfully');
    }

    /**
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Starttime  $user
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Starttime $starttime)
    {
        $starttime->update(['active'=>false]);
        return $this->sendResponse(new TimeResource($time),'Time deactivate sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Starttime  $user
     * @return \Illuminate\Http\Response
     */
    public function activate(Starttime $starttime)
    {
        $starttime->update(['active'=>true]);
        return $this->sendResponse(new TimeResource($time),'Time activated sussesfully');
    }
}
