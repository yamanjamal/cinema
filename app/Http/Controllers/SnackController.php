<?php

namespace App\Http\Controllers;

use App\Http\Resources\SnackResource;
use App\Models\Snack;
use App\Http\Requests\StoreSnackRequest;
use App\Http\Requests\UpdateSnackRequest;
use Intervention\Image\ImageManagerStatic as Image;

class SnackController extends BaseController
{
    public $paginate=7;

    public function __construct()
    {
        $this->authorizeResource(Snack::class,'snack');
    }

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

    public function store(StoreSnackRequest $request)
    {
        $image = $request->file('image');
        $imgname=time().$image->getClientOriginalName();
        $img = Image::make($request->image);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $snack=Snack::create($request->except('image') + ['image'=>'upload/Imgs/'.$imgname]);
        return $this->sendResponse(new SnackResource($snack),'Snack created sussesfully');
    }

    public function show(Snack $snack)
    {
        return $this->sendResponse(new SnackResource($snack),'Snack shown sussesfully');
    }

    public function update(UpdateSnackRequest $request, Snack $snack)
    {
        try{
            unlink(public_path($snack->image));
        }catch(\Exception $e){} 
        $imgname=time().$request->image->getClientOriginalName();
        $img = Image::make($request->image);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $snack->update($request->except('image') + ['image'=>'upload/Imgs/'.$imgname]);
        return $this->sendResponse(new SnackResource($snack),'Snack updated sussesfully');
    }

    public function deactivate(Snack $snack)
    {
        $this->authorize('deactivate', Snack::class);
        $snack->update(['active'=>false]);
        return $this->sendResponse(new SnackResource($snack),'Snack deactivated sussesfully');
    }

    public function activate(Snack $snack)
    {
        $this->authorize('activate', Snack::class);
        $snack->update(['active'=>true]);
        return $this->sendResponse(new SnackResource($snack),'Snack activated sussesfully');
    }
}
