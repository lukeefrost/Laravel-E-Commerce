<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
      $products = Product::all();
      return view('admin.product.index', compact('products'));
    }

    public function create()
    {
      $categories = Category::pluck('name', 'id');
      return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
      $formInput = $request->except('image');

      $this->validate($request, [
        'product_name' => 'required',
        'product_code' => 'required',
        'product_price' => 'required',
        'product_info' => 'required',
        'sale_price' => 'required',
        'image' => 'image|mimes:png,jpg,jpeg|max:10000'
      ]);

      $image = $request->image;
      if ($image) {
        $imageName = $image->getClientOriginalExtension();
        $image->move('images', $imageName);
        $formInput['image']=$imageName;
      }

      $categories = Category::all();
      Product::create($formInput);
      return redirect()->back();
    }

    public function show($id)
    {
      $product = Product::findOrFail($id);
      return view('product.show', compact('products'));
    }

}
