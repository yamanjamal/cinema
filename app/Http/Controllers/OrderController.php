<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Snack;
use App\Models\OrederItem;
use App\Http\Resources\OrderResource;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends BaseController
{
    public $paginate=10;

    // public function __construct()
    // {
    //     $this->authorizeResource(Order::class,'order');
    // }

    public function index()
    {
        $orders = Order::paginate($this->paginate);
        return $this->sendResponse(OrderResource::collection($orders)->response()->getData(true),'Orders sent sussesfully');
    }

    public function store(StoreOrderRequest $request)
    {
        // $order = Order::create($request->validated()+ ['total_price' => $request->total_price]);

        // $order_items_ids =  array_column($request->order_items, 'id');
        // $order_items_ammounts =  array_column($request->order_items, 'ammount');

        // $snacks = Snack::
        // when(count($order_items_ids) > 0, function ($query) use($request, $order_items_ids) {
        //     return $query->whereIn('id', $order_items_ids);
        // })
        // ->when(count($order_items_ids) == 1, function ($query) use($request, $order_items_ids) {
        //     return $query->where('id', $order_items_ids);
        // })->get();

        // $snacks_sum = $snacks->sum('price');

        // $total=0;
        // foreach ($snacks as $index => $snack) {
        //     // $total = $total +($snack->price*$order_items->ammount);
        //     $orderItem = OrederItem::create([
        //         'snack_id' => $snack->id,
        //         'order_id' => $order->id,
        //         'ammount'  => $order_items[$index],
        //     ]);
        // }

        $order = Order::create($request->validated()+ ['total_price' => $request->total_price]);
        
        foreach ($request->order_items as $order_item) {
            $orderItem = OrederItem::create([
                'snack_id' => $order_item['id'],
                'order_id' => $order->id,
                'ammount'  => $order_item['ammount'],
            ]);
        }
        // $order = Order::update(['total_price' => $total]);
        return $this->sendResponse(new OrderResource($order->load('OrederItems') ),'Order created sussesfully');
    }

    public function show(Order $order)
    {
        return $this->sendResponse(new OrderResource($order->load('OrederItems')),'Order shown sussesfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return $this->sendResponse(new OrderResource($order),'Order deleted sussesfully');
    }
}
