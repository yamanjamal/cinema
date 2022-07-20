<?php

namespace App\Http\Controllers;

use App\Http\Resources\SeatResource;
use App\Models\Seat;
use App\Http\Requests\StoreSeatRequest;
use App\Http\Requests\UpdateSeatRequest;

class SeatController extends BaseController
{

    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Seat::class,'seat');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seat::paginate($this->paginate);
        return $this->sendResponse(SeatResource::collection($seats)->response()->getData(true),'Seats sent sussesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeatRequest $request)
    {
        $seat = Seat::create($request->validated());
        return $this->sendResponse(new SeatResource($seat ),'Seat created sussesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        return $this->sendResponse(new SeatResource($seat),'Seat shown sussesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeatRequest  $request
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeatRequest $request, Seat $seat)
    {
        $seat->update($request->validated());
        return $this->sendResponse(new SeatResource($seat),'Seat updated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        return $this->sendResponse(new SeatResource($seat),'Seat deleted sussesfully');
    }
}
