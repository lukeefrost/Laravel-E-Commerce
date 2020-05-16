@extends('front.master')

@section('content')
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <div class="album text-muted">
    <div class="container">


      <div class="row">
        @forelse($products as $product)
          <div class="card" style="width:30rem height: 20rem">
            <img src="{{url('images', $product->image)}}" class="card-image">
            <div class="card-body">

            <p id="price">

            <p class="card-text iphone">{{$product->product_name}}</p>
            <button class="btn btn-primary btn-sm">
              <a href="{{url('/product_details')}}<?php echo $product->id; ?>" class="add-to-cart addcart">View Product</a>
            </button>

            @if($product->sale_price == 0)
            <div class="d-flex justify-content-between align-items-center">
             <p class="card-text">${{$product->product_price}}</p>
              <p class="card-text"></p>
             </div>

             @else

          <div class="d-flex justify-content-between align-items-center">
           <p class="" style="text-decoration:line-through; color:#333">${{$product->sale_price}}</p>

           <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
            <p class="">${{$product->product_price}}</p>


            </div>
           @endif
          </p>

            <button class="btn btn-primary btn-sm float-right">
              <a href="{{url('/cart/addItem')}}<?php echo $product->id; ?>" class="add-to-cart addcart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
            </button>
        </div>
        </div>

        @empty
        <h3>No Products</h3>
        @endforelse

      </div>
    </div>
  </div>

</main>
@endsection
