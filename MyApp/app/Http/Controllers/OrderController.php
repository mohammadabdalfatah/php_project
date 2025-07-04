<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{

    public function index()
{
      $user = Auth::user();

    if (!$user) {
        abort(403, 'يجب تسجيل الدخول لعرض الطلبات');
    }

    $orders = $user->orders()->with('orderItems.product')->latest()->get();

    return view('orders.index', compact('orders'));
}



    public function checkout()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $cartItems = $user->cartItems()->with('product')->get();
        return view('checkout.index', compact('cartItems'));
    }

    public function placeOrder(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $cartItems = $user->cartItems()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'السلة فارغة!');
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

        return redirect()->route('orders.index')->with('success', 'تم إتمام الطلب بنجاح');
    }

    public function show(Order $order)
{
    if ($order->user_id !== auth()->id()) {
        abort(403, 'غير مصرح لك بعرض هذا الطلب');
    }

    $order->load('orderItems.product');

    return view('orders.show', compact('order'));
}

public function adminIndex()
{
    $orders = Order::with('user', 'orderItems.product')->orderByDesc('created_at')->get();
    return view('admin.orders.index', compact('orders'));
}


}
