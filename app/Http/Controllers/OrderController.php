<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Snack;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\OrederItem;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Resources\InvoiceResource;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends BaseController
{
    public $paginate=10;

    public function __construct()
    {
        $this->authorizeResource(Order::class,'order');
    }

    public function ordered()
    {
        $this->authorize('ordered', Order::class);
        $orders = Order::where('status','ordered')->paginate($this->paginate);
        return $this->sendResponse(OrderResource::collection($orders->load('User'))->response()->getData(true),'Orders sent sussesfully');
    }

    public function approved()
    {
        $this->authorize('approved', Order::class);
        $orders = Order::where('status','approved')->paginate($this->paginate);
        return $this->sendResponse(OrderResource::collection($orders->load('User'))->response()->getData(true),'Orders sent sussesfully');
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
        // $order = Order::update(['total_price' => $total]);

        $user = auth()->user();
        $user_account = $user->Account()->first();

        if($user_account->points > $request->total_price){
            $order = Order::create($request->validated()+ ['total_price' => $request->total_price,'user_id'=>$user->id, 'date'=>now()]);
            
            foreach ($request->order_items as $order_item) {
                $orderItem = OrederItem::create([
                    'snack_id' => $order_item['id'],
                    'order_id' => $order->id,
                    'ammount'  => $order_item['ammount'],
                ]);
            }
            $user_account->update(['points' => ($user_account->points - $request->total_price)]);

            $invoice = Invoice::create([
                'user_name' => $user->name,
                'user_phone' => $user->phone,
                'total_price' => $request->total_price,
                'order_id' => $order->id,
                'account_id' => $user_account->id,
            ]);
            return $this->sendResponse(new InvoiceResource($invoice),'Order created sussesfully');
        }
        return $this->sendError('you dont have money');
    }

    public function show(Order $order)
    {
        return $this->sendResponse(new OrderResource($order->load('OrederItems')),'Order shown sussesfully');
    }

    public function approve(Request $request, Order $order)
    {
        $this->authorize('approve', Order::class);
        $order->update(['status'=>'approved']);
        return $this->sendResponse(new OrderResource($order),'Order updated sussesfully');
    }

    public function received(Request $request, Order $order)
    {
        $this->authorize('received', Order::class);
        $order->update(['status'=>'received']);
        return $this->sendResponse(new OrderResource($order),'Order updated sussesfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return $this->sendResponse(new OrderResource($order),'Order deleted sussesfully');
    }
}
