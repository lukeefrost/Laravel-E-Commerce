@extends('admin.master')

@section('content')

<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
      @include('admin.includes.sidenav')
    </nav>

    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">

        <h1>Dashboard</h1>
         <div class="col-md-6">
            <h1>BMW</h1>
        <h1>Add New </h1>

        <div class="panel-body">

    {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}

    <div class="form-group">
      {{ Form::label('Product Name', 'Name') }}

      {{ Form::text('product_name', null, array('class' => 'form-control', 'required' => '')) }}
    </div>

    <div class="form-group">
      {{ Form::label('Code', 'Code') }}

      {{ Form::text('product_code', null, array('class' => 'form-control', 'required' => '')) }}
    </div>

    <div class="form-group">
      {{ Form::label('Price', 'Price') }}

      {{ Form::text('product_price', null, array('class' => 'form-control', 'required' => '')) }}
    </div>

    <div class="form-group">
      {{ Form::label('Description', 'Description') }}

      {{ Form::text('product_info', null, array('class' => 'form-control', 'required' => '')) }}
    </div>

    <div class="form-group">
      {{ Form::label('category_id', 'Categories') }}
      {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select Category']) }}
    </div>

    <div class="form-group">
      {{ Form::label('Image', 'Image') }}
      {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
      {{ Form::label('Sale Price', 'Sale Price') }}

      {{ Form::text('sale_price', null, array('class' => 'form-control', 'required' => '')) }}
    </div>

    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

    {{!! Form::close() !!}}

  </div>
</div>
@endsection
