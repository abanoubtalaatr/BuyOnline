@include('layouts.frontEnd.header');
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/Category">
                @php 
                   use App\Category;
                   $category =Category::find($product->category_id);
                   
                @endphp 
                {{$category->name}}
              </a>
            </li>

            <li class="breadcrumb-item"><a href="#">{{$product->name}}</a></li>
           
        </ol>
    </nav>

        <div class="card" style='background: aquamarine;font-family: auto;letter-spacing: 1px;'>

            <div class="cart-header pt-md-4">
                <h5 class="card-title text-capitalize text-center">{{$product->name}}</h5>
                <hr>
                <img src="{{asset('images/product')}}/{{$product->image}}" class="card-img-top" alt="..." style='width:50%;height:50%;margin-left:25% '>
            </div><!-- card-header -->
            

            <hr>
            <div class="card-body">
                <label for="">Price : {{$product->price}} $</label>
                <hr>
                <label for="" class='text-danger'>Description</label>
                <p class="card-text">{{$product->description}}</p>
                <hr>

                <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <!--here table -->
                <div class="form-group">
                    <label for="">Details of Product</label> 
                    <table class="table table-bordered text-center table-white rounded">
                    <thead>
                        <tr>
                        <th scope="col">Property </th>
                        <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php 
                    $details= json_decode($product->details);
                    @endphp   
                    
                    @foreach($details as $couple)
                            <tr>
                                <td><input type='text' value="{{$couple[0]}}" class='rounded text-center border-0 pl-2 w-100 pt-1 pb-1' disabled style='background:black;color:white'></td>
                                <td><input type='text' value="{{$couple[1]}}" class='rounded text-center border-0 pl-2 w-100 pt-1 pb-1'disabled style='background:black;color:white'></td>
                                
                            </tr>
                    @endforeach
                    

                    
                    </tbody>
                        
                    </table>                     

                </div> 
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++-->

            </div><!-- card-body -->
            

            <div class="card-footer">
                  <strong class="text-danger">discount For This Product : {{$product->discount}} $</strong>
            </div><!-- card-footer -->
            

         </div> <!-- End card -->
        

        
     
  


</div> <!-- End container  -->
