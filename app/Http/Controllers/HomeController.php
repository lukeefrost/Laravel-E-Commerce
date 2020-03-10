<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.home');
    }

    public function shop()
    {
        $products = Product::all();
        return view('front.shop', compact('products'));
    }

    public function contact()
    {
        return view('front.contact');
    }

}
