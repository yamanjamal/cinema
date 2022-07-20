<?php

namespace App\Http\Controllers;

use App\Http\Resources\HallResource;
use App\Models\Hall;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;

class HallController extends BaseController
{

    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Hall::class,'hall');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halls = Hall::paginate($this->paginate);
        return $this->sendResponse(HallResource::collection($halls)->response()->getData(true),'Halls sent sussesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHallRequest $request)
    {
        $hall = Hall::create($request->validated());
        return $this->sendResponse(new HallResource($hall ),'Hall created sussesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        return $this->sendResponse(new HallResource($hall),'Hall shown sussesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHallRequest  $request
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $hall->update($request->validated());
        return $this->sendResponse(new HallResource($hall),'Hall updated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();
        return $this->sendResponse(new HallResource($hall),'Hall deleted sussesfully');
    }
}
