<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
        return back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
}