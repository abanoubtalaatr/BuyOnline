@extends('Inbackground.admin.dashboard')


@section('content')

@include('Inbackground.product.master')

 <div class="col-md-12 p" >
  @php 
      use App\Category;
      // this mean get all categories and products that belong that category
      $categories = Category::with('products')->groupBy('id')->get();
      
  @endphp

  <div id="accordion">
    @foreach($categories as $category)
      <div class="card  pb-1" style='background: aliceblue;'>

          <div class="card-header" id="heading{{$category->id}}">
            <h5 class="mb-0">
              <button class="btn text-primary" data-toggle="collapse" data-target="#collapsec{{$category->id}}" aria-expanded="true" aria-controls="collapse{{$category->id}}" style='width:100%;text-align:start;height:100%;box-shadow:none'>
                  <span> {{$category->name}}</span> 
                  <i class='fas fa-arrow-circle-down' style='float: right;font-size: 25px;color: black;'></i>
              </button>
            </h5>
          </div><!--card header-->

          <div id="collapsec{{$category->id}}" class="collapse " aria-labelledby="heading{{$category->id}}" data-parent="#accordion">
            <div class="card-body p-1 float-right "  style='width:97%'>
              <div id = "accordion{{$category->id}}">
                @foreach($category->products as $product)
                  <div class="card">

                    <div class="card-header p-0 m-0" id="heading{{$product->id}}">
                      <h5 class="mb-0" style='background:#6ad3d6;padding:4px'>
                        <button class="btn text-primary text-capitalize" data-toggle="collapse" data-target="#collapsep{{$product->id}}" aria-expanded="false" aria-controls="collapse{{$product->id}}" style='box-shadow:none'>
                            <span class='d-inline-block text-dark '  style='width: 300px; text-align: start;font-weight:bold;'>{{$product->name}}</span>
                            <i class='fas fa-arrow-circle-down' style='margin-left: 10px;'></i>
                        </button>

                        <div class="buttons float-right d-inline-block">
                             <button class='btn btn-warning' onclick = "window.location = '/admin/product/edit/{{$product->id}}'">
                                <i class='fas fa-edit'></i>
                               <span>Edit</span>
                             </button>
                             <!-- Button trigger modal -->
                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong{{$product->id}}">
                                  <i class='fas fa-trash-alt'></i>
                                  <span>Delete</span>
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModalLong{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$product->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style='background: whitesmoke;'>
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle{{$product->id}}">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body p-0">
                                            <div class="alert alert-danger m-0 h6">
                                                are you sure you want to delete =>  <strong>{{$product->name}}</strong> 
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                            <button type="button" class="btn btn-danger" onclick="window.location ='/admin/product/delete/{{$product->id}}'">Yes</button>
                                        </div>

                                      </div> <!--model-content-->
                                </div> <!--model-dialog-->
                               </div>  <!--modal-->  
                          </div>  <!-- buttons -->
                      </h5>
                    </div><!--card header-->

                    <div id="collapsep{{$product->id}}" class="collapse " aria-labelledby="heading{{$product->id}}" data-parent="#accordion{{$category->id}}">
                     
                      <div class="card-body  mt-2 rounded text-white bg-info"style=''>
                          
                          <div class="form-group">
                            <label for="price" class='d-block'>price</label>
                            <input class='form-control bg-white' id='price' value="{{$product->price}} $" disabled>
                          </div>
                           <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->
                          <div class="form-group">
                            <label for="description" class='d-block'>description of {{$product->name}} </label>
                            <div  class = 'form-control bg-white' style='height:fit-content'>{!! $product->description!!}</div>
                          </div>
                          <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->
                          <!--here table -->
                          <div class="form-group">
                              <label for="">Details of Product</label> 
                              <table class="table table-bordered text-center table-white rounded">
                              <thead>
                                  <tr>
                                    
                                    <th scope="col">property </th>
                                    <th scope="col">value</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @php 
                                $details= json_decode($product->details);
                                @endphp   
                               
                                @foreach($details as $couple)
                                        <tr>
                                          <td><input type='text' value="{{$couple[0]}}" class='rounded text-center border-0 pl-2 w-50 pt-1 pb-1' disabled></td>
                                          <td><input type='text' value="{{$couple[1]}}" class='rounded text-center border-0 pl-2 w-50 pt-1 pb-1'disabled></td>
                                          
                                        </tr>
                                @endforeach
                               

                                
                                </tbody>
                                 
                              </table>                     

                          </div> 
                          <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->
                          <div class="form-group">
                            <label for="image" class='d-block'>images for {{$product->name}}</label>
                            <img  class = 'mt-3 rounded' src="{{asset('images/product')}}/{{$product->image}}">
                          </div> 
                          <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->
                          <div class="form-group">
                            <label for="breif" class='d-block' > breif for product</label>
                            <textarea  class = 'form-control bg-white' name="" id="brief" cols="30" rows="2"disabled>{{$product->brief}}</textarea>
                          </div>
                          <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->
                          <div class="form-group">
                            <label for="amount" class='d-block'>Amount in stock </label>
                            <input type="text" class='form-control bg-white ' value="{{$product->amount}}" disabled>
                          </div>
                          <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->
                          <div class="form-group">
                            <label for="discount" class='d-block'>discount for this product</label>
                            <input type="text" class='form-control bg-white' disabled value='{{$product->discount}}'>
                          </div>

                      </div> <!--card-body-->

                   </div>  <!--card -->  
               </div> <!-- collapse $product->id-->
                 @endforeach
              </div>  <!-- accordion $category->id-->
            
            </div> <!-- card-body-->
            
          </div> <!--collapse -->

      </div> <!-- card -->
    @endforeach
   </div>  <!-- End accordion --> 
 </div> <!-- End col-md-12 -->
@stop