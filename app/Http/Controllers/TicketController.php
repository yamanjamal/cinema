<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Price;
use App\Models\Ticket;
use App\Http\Resources\MovieResource;
use App\Http\Resources\TicketResource;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Requests\StepTwoTicketRequest;

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
    public function stepOne(Movie $movie)
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
    public function stepTwo(StepTwoTicketRequest $request, Movie $movie)
    {
        // $this->authorize('stepTwo', Ticket::class);
        $thehall = $movie->Hall()->first();
        $hall = $thehall->id;
        $movie_id = $movie->id;
        $date = $request->date;
        $st = $request->starttime;
        $availableseates = $thehall->Seats()->where('available',1)->get();
        return $this->sendResponse(['movie_id'=>$movie_id, 'hall'=>$hall, 'date' => $date, 'starttime' => $st, 'availableseates'=>$availableseates],'Ticket created sussesfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request, Movie $movie)
    {
        $totla=0;
        $ticketprice = Price::first();
        if ($request->glasses == 0) {
            $total = ($ticketprice->ticket_price);
        }else{
            $total = ($ticketprice->ticket_price + $ticketprice->glass_price);
        }

        $user = auth()->user();
        $user_account = $user->Account()->first();

        if($user_account->points > $total){
            $ticket = Ticket::create([
                'movie_id' => $movie->id,
                'seat_id'  => $request->seats,
                'user_id'  => auth()->user()->id,
                'price_id' => '1',
                'glasses'  => $request->glasses,
                'date'     => $request->date,
                'starttime'=> $request->starttime,
            ]);
            $ticket->Seat()->update(['available'=>0]);
            $user_account->update(['points' => ($user_account->points - $total)]);
            return $this->sendResponse(new TicketResource($ticket),'Ticket created sussesfully');
        }else{
            return $this->sendError( '','Account does not have enough money',400);
        }

        // if (count($request->seats)>=1){
        //     foreach ($request->seats as $seat) {
        //         $ticket=Ticket::create([
        //             'movie_id' => $movie->id,
        //             'seat_id'  => $seat->id,
        //             'user_id'  => auth()->user()->id,
        //             'price_id' => '1',

        //             'glasses'  => 0,
        //             // 'glasses'  => $request->glasses,
        //             'date'     => $request->date,
        //             'starttime'=> $request->starttime,
        //         ]);
        //        $ticket->Seat()->update(['available'=>0]);
        //     }
        //     if ($request->glasses==0) {
        //         $total=($ticketprice->ticket_price)*count($request->seats);
        //     }else{
        //         $total=($ticketprice->ticket_price + $ticketprice->glass_price)*count($request->seats);
        //     }
        // }else{
            


            // $ticket = Ticket::create($request->validated());
        // }
    }
}
