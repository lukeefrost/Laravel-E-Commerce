<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\WishList;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('front.home');
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('front.shop', compact(['categories', 'products']));
    }

    public function product_details($id)
    {
        $products = Product::findOrFail($id);
        return view('front.product_details', compact('products'));
    }

    public function wishList(Request $request)
    {
        $wishList = new WishList;
        $wishList->user_id = Auth::user()->id;
        $wishList->pro_id = $request->pro_id;
        $wishList->save();

        $products = DB::table('products')->where('id', $request->pro_id)->get();

        return view('front.product_details', compact('products'));
    }

    public function contact()
    {
        return view('front.contact');
    }

}
