<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Movie;
use App\Models\Ticket;

class TicketController extends BaseController
{

    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Ticket::class,'ticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function stepOne(StoreTicketRequest $request,Movie $movie)
    {
        $this->authorize('stepOne', Ticket::class);
        return $this->sendResponse(new MovieResource($movie->load(['Times','Hall'])),'step one created sussesfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function stepTwo(StoreTicketRequest $request,Movie $movie)
    {
        $this->authorize('stepTwo', Ticket::class);
        $hall=$request->hall_id;
        $date=$request->date;
        $st=$request->starttime;
        $movie=$request->movie_id;
        $glass=$request->glasses;
        $availableseates=$movie1->Hall->seats->where('available',1);
        $ticket = Ticket::create($request->validated());
        return $this->sendResponse(new TicketResource($ticket),'Ticket created sussesfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request,Movie $movie)
    {
        $hall=$request->hall_id;
        $date=$request->date;
        $st=$request->starttime;
        $movie=$request->movie_id;
        $glass=$request->glasses;
        $availableseates=$movie1->Hall->seats->where('available',1);
        $ticket = Ticket::create($request->validated());
        return $this->sendResponse(new TicketResource($ticket),'Ticket created sussesfully');
    }
}
