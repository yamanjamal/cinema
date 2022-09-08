<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Time;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Price;
use App\Http\Resources\MovieResource;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class MovieController extends BaseController
{

    public $paginate=7;

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
        $movies = Movie::with(['Genres','Hall'])->paginate($this->paginate);
        return $this->sendResponse(MovieResource::collection($movies)->response()->getData(true),'Movies sent sussesfully');
    }

    public function indexuser()
    {
        $movies = Movie::with(['Genres','Hall'])->where('showing_type','now showing')->paginate(3);
        return $this->sendResponse(MovieResource::collection($movies)->response()->getData(true),'Movies sent sussesfully');
    }


    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halls =Hall::all();
        $genres =Genre::all();
        $times =Time::all();
        return $this->sendResponse(['halls'=>$halls, 'genres' => $genres, 'times' => $times],'data sent sussesfully');
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
        $movie->Times()->attach($request->times);
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
    public function edit(Movie $movie)
    {
        $halls  = Hall::all();
        $genres = Genre::all();
        $movie_genres = $movie->Genres;
        $times =Time::all();
        $movie_times = $movie->Times;
        return $this->sendResponse(['movie'=>$movie,'halls'=>$halls, 'genres' => $genres,  'movie_times' => $movie_times, 'times' => $times,  'movie_genres' => $movie_genres],'Movie updated sussesfully');
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
        $imgname = time().$request->image->getClientOriginalName();
        $img = Image::make($request->image);
        $img->save('upload/Imgs/'.$imgname,100,'jpg');
        $movie->update($request->except('image') + ['image'=>'upload/Imgs/'.$imgname]);
        $movie->Genres()->sync($request->genres);
        $movie->times()->sync($request->times);
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

    public function search(Request $request)
    {
        // $this->authorize('search', Movie::class);
        return 's';
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
        // return $this->sendResponse(['movies' => $movies, 'genres' => $genres],'Movie deleted sussesfully');
    }
}
