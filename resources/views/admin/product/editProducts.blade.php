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
        <div class="content-box-large">
          <?php {?>
            $products = DB::table('products_properties')->where('pro_id', $proId)->get();
            if(count($products) == 0)
            {

            } else {
              ?> <div class="panel-heading">
                <div class="panel-title">
                  Update Properties
                  <a href="" class="btn btn-info pull-right" style="margin:-6px; color:#fff">Add More</a>

                </div>
              </div>
            }

          <table class="table table-responsive">
            <tr>
              <td>Size</td>
              <td>Color</td>
              <td>Price</td>
              <td>Update</td>
            </tr>

            @foreach($prots as $prod)

            {{!! Form::open(['url' => 'admin/editProperty', 'method' => 'post']) !!}}
            <tr>
              <input type="hidden" name="pro_id" value="{{$prod->pro_id}}" size="6"/> <!-- products_properties pro_id -->
              <input type="hidden" name="id" value="{{$prod->id}}" size="6"/> <!--// products_properties id -->
              <td><input type="text" name="size" value="{{$prod->size}}" size="6"/></td>
              <td><input type="text" name="color" value="{{$prod->color}}" size="15"/></td>
              <td><input type="text" name="p_price" value="{{$prod->p_price}}" size="6"/></td>
              <td colspan="3" align="right"><input type="submit" class="btn btn-success"
              value="Save" style="margin:-6px; color:#fff"></td>
            </tr>
            {{!! Form::close() !!}}
            @endforeach
          </table>
        </div>
      <?php } ?>

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
