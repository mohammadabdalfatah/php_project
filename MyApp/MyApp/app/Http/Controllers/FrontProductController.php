<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class FrontProductController extends Controller
{
      public function index()
    {
        $products = Product::latest()->paginate(9); 
        return view('front.products.index', compact('products'));
    }

    public function show($id)
{
    $product = \App\Models\Product::findOrFail($id);
    return view('front.products.show', compact('product'));
}

}
