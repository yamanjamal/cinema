<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Intervention\Image\ImageManagerStatic as Image;

class MovieController extends BaseController
{

    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Movie::class,'movie');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('Genres')->paginate($this->paginate);
        return $this->sendResponse(MovieResource::collection($movies)->response()->getData(true),'Movies sent sussesfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $image = $request->file('image');
        $imgname=time().$image->getClientOriginalName();
        $img = Image::make($request->image);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $movie=Movie::create($request->except('image') + ['image'=>'upload/Imgs/'.$imgname]);
        $movie->Genres()->attach($request->genres);
        $movie->Times()->attach($request->Times);
        return $this->sendResponse(new MovieResource($movie),'Movie created sussesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $this->sendResponse(new MovieResource($movie->load(['Times','Genres'])),'Movie shown sussesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
         try{
            unlink(public_path($movie->image));
        }catch(\Exception $e){}
        $imgname=time().$request->image->getClientOriginalName();
        $img = Image::make($request->image);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $movie->update($request->except('image') + ['image'=>'upload/Imgs/'.$imgname]);
        $movie->Genres()->sync($request->genres);
        $movie->Starttimes()->sync($request->starttimes);
        return $this->sendResponse(new MovieResource($movie->load(['Genres','Times'])),'Movie updated sussesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        try{
            unlink(public_path($movie->image));
        }catch(\Exception $e){}

        $movie->delete();
        return $this->sendResponse(new MovieResource($movie),'Movie deleted sussesfully');
    }
    
    /**
     * [search description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function search(Request $request)
    {
        // $prices = Price::all();
        // $genres=Genre::all();
        // $movies= Movie::with('Genres')
        // ->when($request->name,function($query) use($request){
        //     $query->where('name','like',"{$request->name}%");
        // })
        // ->when($request->type,function($query) use($request){
        //     $query->where('type',$request->type);
        // })
        // ->when($request->genres,function($query) use($request){
        //     $query->whereHas('Genres',function($query) use ($request) {
        //         return $query->where('genre_id',$request->genres);
        //     });
        // })
        // ->paginate(5);
        // return view('Admin.Movie.index-movie',compact('movies','prices','genres'));
    }
}
