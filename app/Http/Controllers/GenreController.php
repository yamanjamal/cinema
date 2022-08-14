<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Models\Genre;

class GenreController extends BaseController
{

    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Genre::class,'genre');
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
        $Genre = Genre::paginate($this->paginate);
        return $this->sendResponse(GenreResource::collection($Genre)->response()->getData(true),'Genre sent sussesfully');
    }
}
