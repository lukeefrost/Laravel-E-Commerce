<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\WishList;
use App\Recommends;

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
        if(Auth::check()){
          $recommends = new Recommends;
          $recommends->uid = Auth::user()->id;
          $recommends->pro_id = $id;
          $recommends->save();
        }

        $products = DB::table('products')->where('id', $id)->get();
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

    public function viewWishList()
    {
        $Products = DB::table('wishlist')->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->get();
        return view('front.wishList', compact('Products'));
    }

    public function removeWishList($id)
    {
        DB::table('wishlist')->where('pro_id', '=', $id)->delete();
        return back()->with('msg', 'Item Removed from Wish List');
    }

    public function contact()
    {
        return view('front.contact');
    }

}
