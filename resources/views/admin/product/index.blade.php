@extends('admin.master')


@section('content')

 <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
<h3>Products</h3>

<ul>






     <!-- INVERSE/DARK TABLE -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Image</th>

                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Price</th>
                    <th>Category Id</th>
                    <th>On Sale</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>


               @foreach($products as $product)



                <tr>
                    <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>


                    <td style="width:50px;">{{$product->id}} </td>

                    <td style="width:50px;">{{$product->product_name}} </td>
                    <td style="width:50px;">{{$product->product_code}} </td>
                    <td style="width:50px;">{{$product->product_price}} </td>
                    <td style="width:50px;">{{$product->category_id}}</td>

                    <td><a href="{{route('ProductEditForm',$product->id)}}" class="btn btn-success btn-small">Edit</a></td>


                   {!! Form::open(['method'=>'DELETE', 'action'=> ['ProductsController@destroy', $product->id]]) !!}


                  <td>  {!! Form::submit('Delete Product', ['class'=>'btn btn-danger col-sm-6']) !!}</td>



                  {!! Form::close() !!}

                </tr>

                @endforeach


            </tbody>
        </table>


</main>



 @endsection
