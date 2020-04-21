<header>
<div class="collapse bg-dark" id="navbarHeader">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-7 py-4">
        <h4 class="text-white">About</h4>
        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
      </div>
      <div class="col-sm-4 offset-md-1 py-4">
        <h4 class="text-white">Contact</h4>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Follow on Twitter</a></li>
          <li><a href="#" class="text-white">Like on Facebook</a></li>
          <li><a href="#" class="text-white">Email me</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

  <div class="navbar navbar-dark bg-dark box-shadow">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a href="{{'/'}}" class="navbar-brand"><img src="{{URL::asset('images/ecom.png')}}" alt="..."></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/shop')}}">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
        <?php  $cats = DB::table('categories')->get(); ?>
        @foreach($cats as $cat)
          <a class="dropdown-item" href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a>
        @endforeach
      </div>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/wishList')}}"><i class="fa fa fa-star"></i>Wish List <span style="color:green; font-weight:bold">({{App\WishList::count()}})</span></a>
      </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
      <?php if (Auth::check()) { ?>
      <div class="dropdown-menu" aria-labelledby="dropdown01">
        <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
      <?php } ?>
      <?php if (Auth::check()) { ?>
        <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
        <a class="dropdown-item" href="{{url('/')}}/profile">Profile</a>
      <?php } else { ?>
        <a class="dropdown-item" href="{{url('/login')}}">Login</a>
      <?php } ?>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-secondary badge-pill"><i class="fa fa-shopping-cart"></i>{{Cart::count()}}</span></a>
      <div class="dropdown-menu" aria-labelledby="dropdown01">
        <div class="">
    <h4 class="d-flex justify-content-between align-items-center mb-3">

      <span class="badge badge-secondary badge-pill"><i class="fa fa-shopping-cart"></i>{{Cart::count()}}</span>
      <span class="text-muted">Total: ({{Cart::total()}})</span>

    </h4>



    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-muted">Your cart</span>

    </h4>


    <ul class="list-group mb-3">
      <?php $cartItems = Cart::content();?>
          @foreach($cartItems as $cartItem)
      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div class="col-md-6">
        <div>


          <img  class="dropdownimage" src="{{url('images',$cartItem->options->img)}}"  class="img-responsive dropdownimage" style="width:50px" />



        </div>
      </div>



        <div class="col-md-6">
        <h6 class="my-0">Name: {{$cartItem->name}}</h6>
        <span class="text-muted">Price: {{$cartItem->price}}</span>
      </br>
        <small class="text-muted foat-right">Qty: {{$cartItem->qty}}</small>

      </div>
      </li>
       @endforeach


        <li class="list-group-item d-flex justify-content-between">

        <a class="btn btn-primary" href="{{url('/')}}/checkout">Check Out</a>


        <a class="btn btn-primary float-right" href="{{url('/cart')}}">View Cart</a>


      </li>



    </ul>









  </div>

  </div>

    </li>

    <li class="list-inline-item"><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart">View Cart</i>({{Cart::count()}}) ({{Cart::total()}})</a></li>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>
