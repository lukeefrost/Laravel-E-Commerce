@extends('admin.master')


@section('content')






<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
  <h3>Products</h3>

  <ul>


    <div class="row">


      <div class="col-md-4">



        <br>

        <br>
        <br>

        <br>

        {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@editProducts', $products->id], 'files'=>true]) !!}

        <Select class="form-control" name="cat_id">
          @foreach($categories as $cat)
          Category:  <option value="{{ $cat->id }}"  <?php
          if($products->category_id==$cat->id) {?> selected="selected"<?php }?>


          >{{ ucwords($cat->name) }}</option>
          @endforeach
        </select>
        <br>


        <div class="form-group">
          {!! Form::label('product_name', 'Name:') !!}
          {!! Form::text('product_name', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
          {!! Form::label('product_price', 'Pro Price:') !!}
          {!! Form::text('product_price', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
          {!! Form::label('product_code', 'Pro Code:') !!}
          {!! Form::text('product_code', null, ['class'=>'form-control'])!!}
        </div>





        <img class="card-img-top img-fluid" src="{{url('images',$products->image)}}" style="width:50px" alt="Card image cap">


        <div class="form-group">
          {!! Form::label('sale_price', 'Spl Price:') !!}
          {!! Form::text('sale_price', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
          {!! Form::label('product_info', 'Pro Info:') !!}
          {!! Form::text('product_info', null, ['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
          New Arrival: <p class="pull-right"><input type="checkbox" name="new_arrival" value="1"></p>
        </div>




        {{ Form::submit('Update', array('class' => 'btn btn-default')) }}



        {{!! Form::close() !!}}

      </div>

      <div class="col-md-3">
        <div align="center">
          <a href="{{route('addProperty', $products->id)}}" class="btn btn-sm btn-info" style="margin:5px">Add Property</a>
        <br>
        </div>

                <h1>Change Image</h1>
                <img class="card-img-top img-fluid" src="{{url('images',$products->image)}}" style="width:200px" alt="Card image cap">

                <p><a href="{{route('ImageEditForm',$products->id)}}"
                  class="btn btn-info">Change Image</a>
                </p>

            </div>
          </div>

        </main>

    @endsection
