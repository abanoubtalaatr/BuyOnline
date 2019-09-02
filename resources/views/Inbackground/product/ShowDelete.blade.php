@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.product.master')
    @php 
     use App\Product;
     use App\Category;
     $products = Product::all();
    @endphp 
 <div class="col-md-12 p" >

    <table class="table " style='background: aliceblue;'>
        <thead>
            <tr>
               
                <th scope="col">Name </th>
                <th scope="col">Department</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope='col'>Discount</th>
                <th scope="col" class='text-center'>Control</th>
            </tr>
        </thead>
        <tbody>



           @foreach($products as $product)
                <tr>
                    
                    <td>{{$product->name}}</td>
                    @php 
                        $category = Category::find($product->category_id);
                       
                    @endphp
                    <td>{{$category->name}}</td>
                    <td> {{$product->price}} <span  style='color:#85bb65'>$</span></td>
                    <td>{{$product->amount}} <span  style='color:#85bb65'>$</span></td>
                    <td>{{$product->discount}}</td>
                    <td class='text-center'>
                                   <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong{{$category->id}}">
                                <i class='fas fa-trash-alt'></i>
                                <span>Delete</span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$category->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style='background: whitesmoke;'>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle{{$category->id}}">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="alert alert-danger m-0">
                                            are you sure you want to delete =>  <strong>{{$category->name}}</strong> 
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location ='/admin/product/delete/{{$product->id}}'">Yes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 
 
 </div>
@stop