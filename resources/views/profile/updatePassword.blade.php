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

      {!! Form::open(['url' => 'updatePassword', 'method' => 'post']) !!}

      <div class="container">
        <div class="form-group row">
          <div class="form-group col-md-6">
            <label for="example-text-input">Current Password</label>
              <input class="form-control" type="text" name="oldPassword">
              <span style="color:red">{{$errors->first('old_password')}}</span>
          </div>

          <br>

          <div class="form-group col-md-6">
            <label for="example-text-input">New Password</label>
              <input class="form-control" type="text" name="newPassword">
              <span style="color:red">{{$errors->first('newPassword')}}</span>
          </div>

          <div class="form-group col-md-6">
            <input type="submit" value="Update" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>

    {!! Form::close() !!}

    </div>

  </div>

</section>


@endsection
