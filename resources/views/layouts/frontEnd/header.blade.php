<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet'>
        <link href="{{asset('css/css/all.css')}}" rel='stylesheet'>

    </head>
<body class='bg-info'>

 <!-- Start header -->
 <header class='bg-dark'>
    <div class="container">

            <div class="name bg-dark" style='margin-left:39%;padding: 21px 0px;'>
                <div class="image bg-white d-inline-block rounded"  style = 'width:50px;height:50px;'>
                <img class='p-md-2' style='width:100%;height:100%'src="{{asset('images/amazon_PNG6.png')}}">
            </div>

           <div class="head d-inline-block" style='position:relative'>
             <h1 class='mb-md-0 text-white ' style='width: 200px;bottom: -19px;position: absolute;left:18px'>Buy Online</h1>
           </div>
           
         </div> <!--name -->
    
    </div>   <!--container -->

   </header>  
   <!-- End header -->

<!-- Start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style='padding: 27px 0px;'>
          
        <div class="container">
       
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="form col-md-5">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 col-md-8 " type="search" placeholder="Search" aria-label="Search" style='box-shadow: none;'>
                    <button class="btn btn-primary my-2 my-sm-0 col-md-3 " type="submit">Search</button>
                </form>
            </div>

            <div class="links col-md-7 text-white">
                <ul class='list-unstyled '>
                
                    <li class='float-left pl-md-3 pr-md-3'> 
                    
                    
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Departments
                        </button>
                        <div class="dropdown-menu">
                           @php 
                            use App\Category;
                            $Categories = Category::all();
                           
                           @endphp
                           @foreach($Categories as $category)
                              <a class="dropdown-item" href="#">{{$category->name}}</a>
                           @endforeach

                        </div>
                    </div>
                    
                    </li>
                    <li class='float-left pl-md-3 pr-md-3'> <button class='btn btn-info'> <a class='text-white btn' href='#' style='box-shadow: none;'>Best Sell</a> </button></li>
                    <li class='float-left pl-md-3 pr-md-3'> <button class='btn btn-info'> <a class='text-white btn' href='#' style='box-shadow: none;'>Offer Today</a> </button></li>
                    
                </ul>

                <div class="flex-center position-ref full-height">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif

        </div><!--flex-center -->
            
            </div>

         </div> <!-- container -->
    </nav>
  <!-- End navbar -->