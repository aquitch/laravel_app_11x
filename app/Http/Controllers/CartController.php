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
        $user = User::with('cart')->find(1);

        return view('cart', compact('user'));
    }
}
