<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    public function show()
    {
        return view('cart', ['user' => auth()->user()->load('cart')]);
    }

    public function update(Request $request)
    {
        auth()->user()->addToCart($request->product_id);

        return redirect()->route('cart.show');
    }
}
