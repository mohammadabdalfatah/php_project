<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index()
{
    $products = Product::all();
        return view('home', compact('products'));
}

}
