<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Product_Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
      $products = DB::table('categories')->rightJoin('products', 'products.category_id', '=', 'categories.id')->get();
      // Fetching all products and categories
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

    public function ProductEditForm($id)
    {
      $products = Product::findOrFail($id);
      $categories = Category::all();

      return view('admin.product.editProducts', compact('products', 'categories'));
    }

    public function editProducts(Request $request, $id)
    {
      $product_id = $request->id;
      $product_name = $request->product_name;
      $category_id = $request->category_id;
      $product_code = $request->product_code;
      $product_price = $request->product_price;
      $product_info = $request->product_info;
      $sales_price = $request->sale_price;

      DB::table('products')->where('id', $product_id)->update([
        'product_name' => $product_name,
        'category_id' => $category_id,
        'product_code' => $product_code,
        'product_price' => $product_price,
        'product_info' => $product_info,
        'sale_price' => $sales_price
      ]);

      return view('admin.product.index', compact('products', 'category'));
    }

    public function ImageEditForm($id)
    {
      $products = Product::findOrFail($id);
      return view('admin.product.ImageEditForm', compact('products'));
    }

    public function editProductImage(Request $request)
    {
      $product_id = $request->id;

      $image = $request->image;
      if($image)
      {
        $imageName = $image->getClientOriginalName();
        $image->move('images', $imageName);
        $formInput['image'] = $imageName;
      }

      DB::table('products')->where('id', $product_id)->update(['image' => $imageName]);

      return redirect()->back();
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function addProperty($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.product.addProperty', compact('products'));
    }

    public function submitProperty(Request $request)
    {
        $properties = new Product_Properties;
        $properties->pro_id = $request->pro_id;
        $properties->size = $request->size;
        $properties->color = $request->color;
        $properties->p_price = $request->p_price;
        $properties->save();

        return redirect()->back();
    }

}
