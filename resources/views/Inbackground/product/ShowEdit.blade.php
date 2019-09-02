@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.product.master')


  <div class="col-md-11 text-dark ml-md-3 " style='padding: 20px;
    background: #d7ecff42;font-weight: bold;
    border-radius: 11px;'>
      <form action='{{route("product.update")}}' method='post' enctype="multipart/form-data">
             
          
              @csrf
              <input type="hidden" value="{{$product->id}}" name='id'>

              <div class="col-md-12" style='overflow:hidden'>
                
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput1">Update Name Product</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Name of Product" name='name' value="{{$product->name}}">
                </div>
               
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput2">Price in dollar</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price" name='price'  value="{{$product->price}}">
                </div>

              </div> 
              <!-- +++++++++++++++++++++++++++++++++++++++ -->

              <div class="col-md-12"style='overflow:hidden'>

                <div class="form-group col-md-6 float-left" style='overflow:hidden'>
                  <label for="formGroupExampleInput5">Discount</label>
                  <input type="text" class="form-control" id="formGroupExampleInput5" placeholder="Discount if exist" name='discount'  value="{{$product->discount}}">
                </div>
               
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput7">Amount</label>
                  <input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Amount of this product" name='amount'  value="{{$product->amount}}">
                </div>
                
              </div>
               <!-- +++++++++++++++++++++++++++++++++++++++ -->
              <div class="col-md-12"style='overflow:hidden'>
                  <label for="formGroupExampleInput3">Description</label>
                  <textarea name="description" class='form-control' id="summernote" cols="30" rows="8" placeholder='Write description' style='resize:none;'  >{{$product->description }}</textarea>
              </div>
              <!-- +++++++++++++++++++++++++++++++++++++++ -->
              <div class="form-group col-md-12 "style='overflow:hidden'>
                  <label for="formGroupExampleInput4">breif</label>
                  <textarea name="brief" class='form-control' id="formGroupExampleInput3" cols="30" rows="4" placeholder='Write a breif about product' style='resize:none'>{{$product->brief}}</textarea>
              </div>
              <!-- +++++++++++++++++++++++++++++++++++++++ -->

              <div class="col-md-12"style='overflow:hidden'>

                <div class="form-group col-md-6 float-left" style='overflow:hidden'>
                  <label for="formGroupExampleInput6">Category Name</label>
                  <select name='category_id'  value="{{$product->category_id}}" class="custom-select mr-sm-2" id="inlineFormCustomSelect" style='box-shadow:none'>
                    
                      @php
                        use App\Category;
                        $categories = Category::all();

                      @endphp

                      <option selected value='{{$product->category_id}}'>@php $cat= Category::find($product->category_id)->get()->first(); echo $cat->name;@endphp</option>
                      
                      @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                      
                      
                  </select>
                </div>
               
                <div class="form-group text-center border-top col-md-6 float-right">
                    <div class='pt-md-2'>
                      <label for="">Upload image</label>
                    </div>
                    
                    <div class="image mb-md-2" >
                      <img src="{{asset('images/product')}}/{{$product->image}}" class='rounded'style='width:400px;height:300px;' id='real_image' >
                    </div> 

                    <div class='col-md-12 pt-md-2'>
                        <button class='btn btn-info col-md-4 p-0 m-0 position-relative'>
                            <span class='position-absolute' style='left: 37%;top: 11%;'>Upload</span>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"accept="image/*" onchange="loadFile(event)" style='width:100%;height:100%;opacity:0'name='image'  value="{{old('image')}}">
                        </button>
                        
                    </div>
                </div>           
              
              </div>
              <!-- +++++++++++++++++++++++++++++++++++++++ -->
             
        
        <div class="col-md-12 border-top pt-md-2 text-center" style='overflow:hidden'>
           <button type='submit' class='btn btn-primary w-25' >submit</button>
        </div>
      </form>
  </div>

@stop

@section('javascript')



<script type='text/javascript' src="{{asset('js/product/product.js')}}"></script>


@stop