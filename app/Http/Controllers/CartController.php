<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Product;
use Gloudemans\Shoppingcart\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
    }

    public function addItem($id)
    {
        echo $id;
        $product = Product::find($id);

        Cart::add('$product->product_name', '$id', 1, $product->product_price);
    }

    public function destroy($id)
    {
        Cart::remove($id);
        // echo $id;
        return back();
    }


}
