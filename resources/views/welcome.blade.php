@include('layouts.frontEnd.header');
        
        
  @php 
      use App\Category;
      // this mean get all categories and products that belong that category
      $categories = Category::with('products')->groupBy('id')->get();
      
  @endphp

  @foreach($categories as $category)
  <div class="category pt-md-5 electonic " >

<div class="container">

 <div class="title pb-md-4">
    <h2>{{$category->name}}</h2>
 </div><!-- End title -->

 <div class="pb-md-4 w-100 overflow-hidden position-relative mb-md-4" style='' id='contain_all{{$category->id}}'>
          
 <div class="position-absolute arrow-left" onclick="verticalٍScrollLeft();"
            style="z-index: 2;
                  left: 3px;
                  background: black;
                  display: inline-block;
                  color: white;
                  width: 40px;
                  height: 40px;
                  top: 135px;
                  line-height: 2;
                  padding-left: 12px;
                  border-radius: 50%;
                  font-size: 20px;">
              <i class="fas fa-arrow-left"></i>
          </div>
    <div class='position-relative items' style='transition: all 0.7s ease-in-out 0s; min-height:500px;'>
    @php
      $propertyLeft = 0 ;
      
      
    @endphp
    
      @foreach($category->products as $product)
           
             
             <a href="/details/{{str_replace(' ','',$product->name)}}/{{$product->id}}">
                  <div class="item bg-white d-inline-block mb-md-2 rounded position-absolute " style="padding: 16px;left:{{$propertyLeft}}px;width:272px;height:100%">

                          <div class="content" style=''>
                              <div class="title-content">
                                  <h5 class='text-center text-capitalize'>{{$product->name}}</h5>
                              </div>

                              <div class="image" style='height:200px;'>
                                  <img src="{{asset('images/product')}}/{{$product->image}}" class ='img-thumbnail h-100'alt="">
                              </div>

                              <hr>
                              <div class="text text-center pt-md-2 " style='height:175px;'>
                                  <p>{{$product->brief}} </p>
                              </div>

                              <div class="price text-center">
                                  <button class="btn btn-primary">
                                  <span class=''> Price<strong>: {{$product->price}}$</strong> </span>
                                  </button>
                              </div>
                          </div>  <!-- item-content-->
                  </div> <!-- End item -->

              </a>
              @php 
                  $propertyLeft += 277.5; 
              @endphp
          }
          @endforeach
          
    </div> <!-- This contain all items -->
    <div class="position-absolute arrow-left" onclick="verticalٍScrollRight();"
            style="z-index: 2;
                  right: 50px;
                  background: black;
                  display: inline-block;
                  color: white;
                  width: 40px;
                  height: 40px;
                  top: 135px;
                  line-height: 2;
                  padding-left: 12px;
                  border-radius: 50%;
                  font-size: 20px;">
              <i class="fas fa-arrow-right"></i>
          </div>
  </div>
  <!-- End scroll div -->

</div><!-- End container -->


</div>  <!-- End Category -->
  @endforeach
    
<!--             ++
                +++     
              ++++
             +++++
           ++++++
          ++++++   
         ++++++
        ++++++
    ++++++++ 
    ++++++++
   ++++++++
  ++++++++
 ++++++++         
 -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/welcome.js')}}"></script>
    </body>
</html>
