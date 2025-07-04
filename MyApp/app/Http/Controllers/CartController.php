<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')
                        ->where('user_id', Auth::id())
                        ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity
            ]);
        }

        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى السلة');
    }

    public function destroy($id)
    {
        $cartItem = CartItem::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $cartItem->delete();

        return redirect()->back()->with('success', 'تم حذف المنتج من السلة');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->back()->with('success', 'تم تحديث الكمية');
    }
}
