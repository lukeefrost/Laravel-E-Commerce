@extends('front.master')

@section('content')

<script>
  $(document).ready(function() {
    $('#size').change(function() {
      var size = $('#size').val();
      var proDum = $('#proDum').val();

  $.ajax({
    type: 'get',
    dataType: 'html',
    url: '<?php echo url('/selectSize');?>',
    data: "size=" + size + "& proDum=" + proDum,
    success: function (response) {
        console.log(response);
       $('#price').html(response);
    }
    });

  });
});

</script>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container align-vertical hero">
<div class="row">
<div class="col-md-5 text-left">


</div>
</div><!--end of row-->
</div><!--end of container-->
</header>

<section id="index-amazon">


<div class="amazon">
<div class="container">

<div class="row">
<div class="col-md-12">
<div class="product">
<div class="row">
<div class="col-md-6 col-xs-12">


<div class="thumbnail">
  <img src="{{url('images', $products->image)}}" class="card-img">
  <br>
</div>
</div>

<div class="col-md-5 col-md-offset-1">
  <div class="product-details">
    <h2 class="product-title"><?php echo ucwords($products->product_name);?></h2>
    <h5>{{$products->product_info}}</h5>

    <form action="{{url('/cart/addItem')}}/<?php echo $products->id; ?>">
      @if($product->sale_price == 0)
    <span id="price">{{$products->product_price}}</span>
    <input type="hidden" value="<?php echo $products->product_price;?>" name="newPrice"/>

    @else
<div class="d-flex justify-content-between align-items-center">

        <input type="hidden" value="<?php echo $product->sale_price;?>" name="newPrice"/>
          <p class="" style="text-decoration:line-through; color:#333">${{$product->sale_price}}</p>
           <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
           <p class="">${{$product->product_price}}</p>

         </div>
@endif

    <h2>{{$products->sale_price}}</h2>
    <p><b>Availability:</b>{{$products->stock}} In Stock</p>

    <?php $sizes = DB::table('products_properties')->where('pro_id', $products->id)->get(); ?>

    <select name="size" id="size">
      @foreach($sizes as $size)
        <option>{{$size->size}}</option>

      @endforeach
    </select>

    @if($product->new_arrival == 1)
    <img src="{{URL::asset('dist/images/product-details/new.jpg')}}" alt="...">

    @endif

    <button class="btn btn-primary btn-sm"><a href="{{url('/cart/addItem')}}/<?php echo $products->id; ?>" class="add-to-cart">Add To Cart<i class="fa fa-shopping-cart"></i></button>

    <input type="hidden" value="<?php echo $products->id; ?>" id="proDum"/>

    </form>

      <?php
        $wishData = DB::table('wishlist')->rightJoin('products', 'wishlist.pro_id', '=', 'products.id')->where('wishlist.pro_id', '=', $products->id)->get();

        $count = App\WishList::where(['pro_id' => $products->id])->count();


      ?>

      <?php if($count == "0"){?>
        {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
          <input type="hidden" value="{{$products->id}}" name="pro_id">
          <input type="submit" value="Add to WishList" class="btn btn-primary"/>

        {!! Form::close() !!}
      <?php } else{?>
        <h3 style="color:green">Already Added to Wishlist<a href="{{url('/wishList')}}">Wish List</a></h3>
    <?php  } ?>

    <p class="">
      <i class="fa fa-shopping-cart"></i> Add To Cart
    </p>
  </div>
</div>

<!-- Start Review -->
<div class="category-tab shop-details-tab"><!--category-tab-->
          <div class="col-sm-12">


            <?php $reviews = DB::table('reviews')->get();
                      $count_reviews = count($reviews);?>

            <ul class="nav nav-tabs">
              <li><a href="#details" data-toggle="tab">Details</a></li>
              <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
              <li><a href="#tag" data-toggle="tab">Tag</a></li>
              <li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{$count_reviews}})</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                {{$product->product_info}}
            </div>

            <div class="tab-pane fade" id="companyprofile" >

            </div>

            <div class="tab-pane fade active in" id="reviews" >
              <div class="col-sm-12">

             <?php $reviews = DB::table('reviews')->get(); ?>


               @foreach($reviews as $review)
                <ul>
                  <li><a href=""><i class="fa fa-user"></i>{{$review->person_name}}</a></li>
                  <li><a href=""><i class="fa fa-clock-o"></i>{{date('H: i', strtotime($review->created_at))}}</a></li>
                  <li><a href=""><i class="fa fa-calendar-o"></i>{{date('F j, Y', strtotime($review->created_at))}}</a></li>
                </ul>

                <p>{{$review->review_content}}</p>



                @endforeach
                <p><b>Write Your Review</b></p>

                <form action="{{url('/addReview')}}" method="post">

                {{ csrf_field() }}
                     <span>
                        <input type="text" name="person_name" placeholder="Your Name"/>
                        <input type="email", name="person_email" placeholder="Email Address"/>
                    </span>
                    <textarea name="review_content" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="submit" class="btn btn-default pull-right">
                        Submit
                    </button>
                 </form>
              </div>
            </div>

          </div>
        </div><!--/category-tab-->

<!-- End of Review -->

@endforeach
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<div class="no-padding-top section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="#" class="load-more"><i class="fa fa-ellipsis-h"</i></a>
      </div>
    </div>
  </div>
</div>

@include('front.recommends')


@endsection
