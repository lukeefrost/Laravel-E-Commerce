@extends('front.master')


@section('content')

<style>
  table td {
    padding: 10px
  }
</style>


<section id="cart-items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="{{url('/profile')}}">Profile</a></li>
        <li class="active">Update Password</li>
      </ol>
    </div>

    <div class="row">
      @include('profile.menu')

    <div class="col-md-8">
      <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>Update Your Password</h3>

      <div class="container">
        
      </div>
    </div>

    </div>

  </div>

</section>


@endsection
