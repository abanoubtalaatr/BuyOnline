@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.product.master')


  <div class="col-md-11 text-dark ml-md-3  " style='padding: 20px;
    background: #d7ecff42;font-weight: bold;
    border-radius: 11px;'>
      <form action='{{route("product.add")}}' method='post' enctype="multipart/form-data">
      @csrf
              
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput1">Add Name Product</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Name of Product" name='name' value="{{old('name')}}">
                </div>
            
             
             
                <div class="form-group col-md-6 float-left ">
                  <label for="formGroupExampleInput2">Price in dollar</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price" name='price'  value="{{old('price')}}">
                </div>

                <!-- +++++++++++++++++++++++++++++++++++++++ -->
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput5">Discount</label>
                  <input type="text" class="form-control" id="formGroupExampleInput5" placeholder="Discount if exist" name='discount'  value="{{old('discount')}}">
                </div>
                <!-- +++++++++++++++++++++++++++++++++++++++ -->
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput7">Amount</label>
                  <input type="text" class="form-control" id="formGroupExampleInput7" placeholder="Amount of this product" name='amount'  value="{{old('amount')}}">
                </div>
                <!-- +++++++++++++++++++++++++++++++++++++++ -->

              <!-- +++++++++++++++++++++++++++++++++++++++ -->
              <div class="col-md-12" style="overflow:hidden">

                <div class="form-group">
                        <label for="formGroupExampleInput3">Description</label>
                        <!-- <textarea id="summernote" name="editordata"></textarea> -->
                        <textarea name="description" class='form-control' id="summernote" cols="30" rows="8" placeholder='Write description' style='resize:none;'  >{{old('description')}}</textarea>
                </div>

              </div>
                <!-- +++++++++++++++++++++++++++++++++++++++ -->
                <hr>
              <div class="col-md-12">
                <label for="">Details of Product</label>
               
                <table class="table table-bordered text-center table-dark rounded">

                  <thead>
                    <tr>
                     
                      <th scope="col">type </th>
                      <th scope="col">value</th>
                    </tr>
                  </thead>
                  <tbody id ='tbody'>
                    <tr>
                      <td><input type='text' name='details[]' class='rounded border-0 pl-2 w-75 pt-1 pb-1'></td>
                      <td><input type='text' name='details[]' class='rounded border-0 pl-2 w-75 pt-1 pb-1'></td>
                    </tr>
                    <tr>
                      <td><input type='text' name='details[]'class='rounded border-0 pl-2 w-75 pt-1 pb-1'></td>
                      <td><input type='text' name='details[]' class='rounded border-0 pl-2 w-75 pt-1 pb-1'></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr class='text-center'>
                      <th colspan='2'>
                        <button class="btn btn-info mr-3" type='button' style='font-weight:bold' onclick='AddRow();'>
                          <i class='fas fa-plus'></i>
                          <span>Add Row</span>
                        </button>

                        <button class="btn btn-danger" type='button' style='font-weight:bold' onclick = 'DeleteRow();'>
                          <i class='fas fa-trash-alt'></i>
                          <span>Delete</span>
                        </button>
                      </th>
                    </tr>
                    </tfoot>

                </table>
              </div>

              <!-- +++++++++++++++++++++++++++++++++++++++ -->
              <div class="col-md-12">
                <div class="form-group">
                  <label for="formGroupExampleInput4">breif</label>
                  <textarea name="brief" class='form-control' id="formGroupExampleInput3" cols="30" rows="4" placeholder='Write a breif about product' style='resize:none'>{{old('brief')}}</textarea>
                </div>
              </div>
              <!-- +++++++++++++++++++++++++++++++++++++++ -->
              <div class="form-group col-md-6 float-left">
                <label for="formGroupExampleInput6">Category Name</label>
                <select name='category_id'  value="{{old('category_id')}}" class="custom-select mr-sm-2" id="inlineFormCustomSelect" style='box-shadow:none'>
                    <option selected >Choose...</option>
                    @php
                      use App\Category;
                      $categories = Category::all();

                    @endphp
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    
                    
                </select>
              </div>

                <div class="form-group text-center border-top col-md-6 float-left">
                  <div class='pt-md-2'>
                    <label for="">Upload image</label>
                  </div>
                  <div class="image mb-md-2" >
                    <img src="{{asset('')}}" class='rounded'style='width:400px;height:300px;' id='real_image' value="{{old('image')}}">
                  </div> 

                  <div class='col-md-12 pt-md-2'>
                      <button class='btn btn-info col-md-4 p-0 m-0 position-relative'>
                          <span class='position-absolute' style='left: 37%;top: 11%;'>Upload</span>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1"accept="image/*" onchange="loadFile(event)" style='width:100%;height:100%;opacity:0'name='image'  value="{{old('image')}}">
                      </button>
                      
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

<script src="{{asset('js/product/product.js')}}"></script>
@stop