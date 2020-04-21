@extends('admin.master')


@section('content')



<div class="container">

  <div class="row">


    <div class="col-md-6">

      {!! Form::model($products, ['method'=>'post', 'files'=>true]) !!}

      @foreach($products as $product)
      <input type="hidden" name="id" class="form-control" value="{{$product->id}}">

      <input type="text" class="form-control" value="{{$product->product_name}}" readonly="readonly">
      <br/>
      <img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="150px" alt="Card image cap"/>

      <br/>
      Select Image:
      {{ Form::label('image', 'Image') }}
      {{ Form::file('image',array('class' => 'form-control')) }}
      @endforeach

      <br/>
      <input type="submit" value="Upload Image" class="btn btn-success pull-right">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      {!! Form::close() !!}

    </div>


  </div>
</div>



@endsection
