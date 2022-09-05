<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
use App\Http\Resources\HallResource;
use App\Models\Hall;
use App\Services\Fillseats;

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
        $Service = new Fillseats();
        $Service->fillseat($hall->id);
        return $this->sendResponse(new HallResource($hall ),'Hall created sussesfully');
    }
}
