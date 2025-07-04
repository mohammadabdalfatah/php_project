<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return response()->json($cart);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'nullable|integer|min:1'
        ]);

        $cartItem = Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => $request->input('quantity', 1)]
        );

        return response()->json(['message' => 'تمت الإضافة للسلة', 'item' => $cartItem]);
    }

    public function destroy($id)
    {
        $item = Cart::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$item) {
            return response()->json(['message' => 'العنصر غير موجود'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'تم الحذف من السلة']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item = Cart::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$item) {
            return response()->json(['message' => 'العنصر غير موجود'], 404);
        }

        $item->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'تم تحديث الكمية', 'item' => $item]);
    }
}
