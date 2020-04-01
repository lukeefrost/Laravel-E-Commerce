<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Product;
use Cart;
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
        //echo $id;
        $product = Product::find($id);

        Cart::add($id, $product->product_name, 1, $product->product_price, ['img' => $product->image, 'stock' => $product->stock]);
        return back();
    }

    public function destroy($id)
    {
        Cart::remove($id);
        // echo $id;
        return back();
    }

    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $proId = $request->proId;
        $products = Product::find($proId);
        $stock = $products->stock;
        return back();

        if($qty<$stock) {
          $message = "Cart is updated";
          Cart::update($id, $request->qty);
          return back()->with('status', $msg);
        } else {
          $msg = "Please check your quantity is more than product stock";
          return back()->with('error', $msg);
        }
    }


}
