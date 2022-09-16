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
use App\Http\Resources\OrderItemResource;

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
        $user = auth()->user();
        $user_account = $user->Account()->first();

        if($user_account->points > $request->total_price){
            $order = Order::create($request->validated()+ ['total_price' => $request->total_price,'user_id'=>$user->id, 'date'=>now()]);
            
            foreach ($request->order_items as $order_item) {
                $orderItem = OrederItem::create([
                    'snack_id' => $order_item['id'],
                    'order_id' => $order->id,
                    'ammount'  => $order_item['ammount'],
                ])->load(['Snack']);
            }

            $user_account->update(['points' => ($user_account->points - $request->total_price)]);

            $invoice = Invoice::create([
                'user_name' => $user->name,
                'user_phone' => $user->phone,
                'total_price' => $request->total_price,
                'order_id' => $order->id,
                'account_id' => $user_account->id,
            ]);
            return $this->sendResponse(new OrderResource($order->load('Invoice','OrederItems')),'Order created sussesfully');
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
