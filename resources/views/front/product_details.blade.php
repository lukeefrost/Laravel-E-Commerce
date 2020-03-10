@extends('front.master')

@section('content')

<div style="width:20rem">

<img src="{{url('images', '$products->image')}}" alt="Card image cap">

<div>

<h4>Card Title</h4>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<a href="#">Read More</a>
</div>
</div>

<div class="product-information">
  <img src="" alt="" />

<div class="product-information">
  <img src="" alt="" />

  <h2><?php echo ucwords($products->product_name);?></h2>

</div>


@endsection
