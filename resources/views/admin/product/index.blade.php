@extends('admin.master')


@section('content')

<script>
 $(document).ready(function(){


<?php for($i=1;$i<60;$i++){?>
  // start loop
      $('#amountDiv<?php echo $i;?>').hide();
      $('#checkSale<?php echo $i;?>').show();
        $('#onSale<?php echo $i;?>').click(function(){  // run when admin need to add amount for sale
          $('#amountDiv<?php echo $i;?>').show();
          $('#checkSale<?php echo $i;?>').hide();
            $('#saveAmount<?php echo $i;?>').click(function(){
              var salePrice<?php echo $i;?> = $('#sale_price<?php echo $i;?>').val();
              var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
                $.ajax({
                  type: 'get',
                  dataType: 'html',
                  url: '<?php echo url('/admin/addSale');?>',
                  data: "salePrice=" + salePrice<?php echo $i;?> + "& pro_id=" + pro_id<?php echo $i;?>,
                  success: function (response) {
                      console.log(response);
                  }
              });
            });
        });
        $('#noSale<?php echo $i;?>').click(function(){ // this when admin dnt need sale
          $('#amountDiv<?php echo $i;?>').hide();
          $('#checkSale<?php echo $i;?>').show();

        });
        //end loop
        <?php }?>
 });


</script>

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
              <?php $count = 1;?>

               @foreach($products as $product)



                <tr>
                    <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>


                    <td style="width:50px;">{{$product->id}} </td>

                    <td style="width:50px;">{{$product->product_name}} </td>
                    <td style="width:50px;">{{$product->product_code}} </td>
                    <td style="width:50px;">{{$product->product_price}} </td>
                    <td style="width:50px;">{{$product->category_id}}</td>
                    <td style="width:50px;">{{$product->category_id}}</td>

                    <div id="checkSale<?php echo $count;?>">
                      <td><input type="checkbox" id="onSale<?php echo $count;?>">Yes</td>
                    </div>

                    <div id="amountDiv<?php echo $count;?>">

                      <input type="hidden" id="pro_id<?php echo $count;?>" value="{{$product->id}}"/>

                      <input type="checkbox" id="noSale<?php echo $count;?>"> No <br>

                      <input type="text" id="sale_price<?php echo $count;?>" size="12" value="12" placeholder="Sale Price"><br>

                      <button type="submit" id="saveAmount<?php echo $count;?>" class="btn btn-success">Save Amount</button>

                    </input>
                  </div>

                   {!! Form::open(['method'=>'DELETE', 'action'=> ['ProductsController@destroy', $product->id]]) !!}


                  <td>  {!! Form::submit('Delete Product', ['class'=>'btn btn-danger col-sm-6']) !!}</td>



                  {!! Form::close() !!}

                </tr>
                <?php $count++;?>

                @endforeach


            </tbody>
        </table>


</main>



 @endsection
