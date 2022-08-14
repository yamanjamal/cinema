<?php

namespace App\Http\Controllers;

use App\Http\Resources\SnackResource;
use App\Models\Snack;
use App\Http\Requests\StoreSnackRequest;
use App\Http\Requests\UpdateSnackRequest;
use Intervention\Image\ImageManagerStatic as Image;

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


    public function indexuser()
    {
        $snacks = Snack::where('active',1)->paginate(3);
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
        $image = $request->file('image');
        $imgname=time().$image->getClientOriginalName();
        $img = Image::make($request->image);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $snack=Snack::create($request->except('image') + ['image'=>'upload/Imgs/'.$imgname]);
        return $this->sendResponse(new SnackResource($snack),'Snack created sussesfully');
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
        try{
            unlink(public_path($movie->image));
        }catch(\Exception $e){} 

        $imgname=time().$request->image->getClientOriginalName();
        $img = Image::make($request->image);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $snack->update($request->except('image') + ['image'=>'upload/Imgs/'.$imgname]);
        return $this->sendResponse(new SnackResource($snack),'Snack updated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function deactivate(Snack $snack)
    {
        $snack->update(['active'=>false]);
        return $this->sendResponse(new SnackResource($snack),'Snack deactivated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snack  $snack
     * @return \Illuminate\Http\Response
     */
    public function activate(Snack $snack)
    {
        $snack->update(['active'=>true]);
        return $this->sendResponse(new SnackResource($snack),'Snack activated sussesfully');
    }
}
