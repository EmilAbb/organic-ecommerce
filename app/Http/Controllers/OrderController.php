<?php

namespace App\Http\Controllers;

use App\Enums\BasketType;
use App\Enums\Guards;
use App\Enums\OrderStatus;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\BasketService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function completeOrder(OrderRequest $orderRequest, BasketService $basketService)
    {
        if (!auth()->guard(Guards::USER->value)->check()) {
            return redirect()->back()->with('error', 'Please Register');
        }
        $basket = $basketService->getCard(BasketType::BASKET);
        if (!$basket->getItems()) {
            return redirect()->back();
        }

        $user = auth()->guard(Guards::USER->value)->user();
        //TODO ADD TRANSACTION
        try {
            DB::beginTransaction();
            $order = Order::create([
                'user_id' => $user->id,
                'total' => $basket->getTotal(),
                'address' => $orderRequest->address,
                'phone' => $orderRequest->phone,
                'status' => OrderStatus::PROCESS->value
            ]);
            $orderItems = [];
            foreach ($basket->getItems() as $basketItem){
                $orderItems[] = [
                    'order_id' => $order->id,
                    'product_id' => $basketItem->get('id'),
                    'qty' => $basketItem->get('quantity'),
                    'price' => $basketItem->get('extra_info')['product']->price,
                    'sub_total' => $basketItem->getSubTotal()
                ];
            }
            OrderItem::insert($orderItems);
            DB::commit();
            $basket->clearItems();
        }catch (\Exception $exception ){
          DB::rollBack();
        }
        return redirect()->route('profile');
    }

    public function orderDetail($orderId)
    {
     $order = Order::where('user_id',auth()->guard(Guards::USER->value)->user()->id)->with('items.product.translations')->where('id',$orderId)->firstOrFail();
     return view('front.order-products',compact('order'));
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== auth()->user()->id){
            abort(403);
        }
        $order->delete();
        return redirect()->route('profile')->with('success','Deleted Order');
    }
}
