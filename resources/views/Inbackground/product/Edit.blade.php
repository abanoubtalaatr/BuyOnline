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
                    <td>{{$product->price}} <span  style='color:#85bb65'>$</span></td>
                    <td>{{$product->amount}} </td>
                    <td>{{$product->discount}}</td>
                    <td class='text-center'>
                      <button class="btn btn-warning mr-md-3" onclick ="window.location='/admin/product/edit/{{$product->id}}'">
                          <i class='fas fa-edit'></i>
                          <span>Edit</span>
                        </button>

                    </td>
                 </tr> 

            @endforeach      
            </tbody>      
 
 </div>
@stop