<?php

namespace App\Http\Controllers;

use App\Http\Resources\SnackResource;
use App\Models\Snack;
use App\Http\Requests\StoreSnackRequest;
use App\Http\Requests\UpdateSnackRequest;

class SnackController extends BaseController
{

    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Snack::class,'snack');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $snacks = Snack::paginate($this->paginate);
        return $this->sendResponse(SnackResource::collection($snacks)->response()->getData(true),'Snacks sent sussesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSnackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSnackRequest $request)
    {
        $snack = Snack::create($request->validated());
        return $this->sendResponse(new SnackResource($snack ),'Snack created sussesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function show(Snack $snack)
    {
        return $this->sendResponse(new SnackResource($snack),'Snack shown sussesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSnackRequest  $request
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSnackRequest $request, Snack $snack)
    {
        $snack->update($request->validated());
        return $this->sendResponse(new SnackResource($snack),'Snack updated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snack $snack)
    {
        $snack->delete();
        return $this->sendResponse(new SnackResource($snack),'Snack deleted sussesfully');
    }
}
