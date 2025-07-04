<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;    

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $orders = $user->orders()->with('orderItems.product')->latest()->get();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'السلة فارغة'], 400);
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $total,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        $user->cartItems()->delete();

        return response()->json(['message' => 'تم إنشاء الطلب بنجاح', 'order_id' => $order->id]);
    }

     public function show($id)
    {
        $user = Auth::user();

        $order = Order::with('orderItems.product')
            ->where('user_id', $user->id)
            ->findOrFail($id);

        return response()->json(['order' => $order], 200);
    }


}
