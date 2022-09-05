<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrederItemResource;
use App\Models\OrederItem;
use App\Http\Requests\StoreOrederItemRequest;
use App\Http\Requests\UpdateOrederItemRequest;

class OrederItemController extends BaseController
{
    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(OrederItem::class,'orederItem');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orederItems = OrederItem::paginate($this->paginate);
        return $this->sendResponse(OrederItemResource::collection($orederItems)->response()->getData(true),'OrederItems sent sussesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrederItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrederItemRequest $request)
    {
        $orederItem = OrederItem::create($request->validated());
        return $this->sendResponse(new OrederItemResource($orederItem ),'OrederItem created sussesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrederItem $orederItem)
    {
        return $this->sendResponse(new OrederItemResource($orederItem),'OrederItem shown sussesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrederItemRequest  $request
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrederItemRequest $request, OrederItem $orederItem)
    {
        $orederItem->update($request->validated());
        return $this->sendResponse(new OrederItemResource($orederItem),'OrederItem updated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrederItem  $orederItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrederItem $orederItem)
    {
        $orederItem->delete();
        return $this->sendResponse(new OrederItemResource($orederItem),'OrederItem deleted sussesfully');
    }
}
