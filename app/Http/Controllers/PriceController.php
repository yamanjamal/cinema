<?php

namespace App\Http\Controllers;

use App\Http\Resources\PriceResource;
use App\Models\Price;
use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;

class PriceController extends BaseController
{
    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Price::class,'price');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceRequest  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Price = Price::first();
        return $this->sendResponse(new PriceResource($Price),'Price sent sussesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceRequest  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceRequest $request, Price $price)
    {
        $price->update($request->validated());
        return $this->sendResponse(new PriceResource($price),'Price updated sussesfully');
    }
}
