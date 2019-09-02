<!DOCTYPE html>

<html>
<head>
   
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  
 <link rel='stylesheet' href="{{asset('css/bootstrap.min.css')}}">
 <link rel='stylesheet' href="{{asset('css/css/all.min.css')}}">

</head>
<body style='font-family:cornflowerblue;font-size:18px;'>

 
     <!-- this is navbar  -->
    <nav class="navbar  border-bottom mb-md-1" style='background-color: #3c8dbc;' >
      
      <div class="container">

      <div class="search float-left">
          <ul class='list-unstyled text-white mb-0'style='font-size:22px;'>
             <li><a href="/" class=' text-white'> Buy Online</a> </li>
          </ul>
      </div>

      <div class="right float-right">
          <ul class='list-unstyled text-white mb-md-0' style='font-size:22px;'>
          <li class='float-left mr-md-3'>
            <i class='fas fa-bell'></i>
            <h6 class='d-inline-block'><span class="badge badge-secondary bg-danger">10</span></h6>
          </li>

          <li class='float-left  mr-md-3'>
          
            <i class='fas fa-envelope'></i>
            <h6 class='d-inline-block'><span class="badge badge-secondary bg-danger">10</span></h6>
          </li>

          <li class='float-left' >
            <div class='image mb-md-0 d-inline-block' style='width:35px;height:35px;'>
              <img src="{{asset('images/1.jpeg')}}" class='' style='border-radius:50%;width:100%;height:100%'>
            </div>
            <div class="name d-inline-block text-capitalize">
              {{auth()->guard('admin')->user()->firstName}}  {{auth()->guard('admin')->user()->lastName}}
            </div>
          </li>
          </ul>
      </div>

      </div>  <!-- End container -->
    
    </nav>  <!-- End nav -->

     
   <div class="contain_all pt-md-2" style='overflow:hidden;background:#0384840f;min-height:600px;'>
      <aside style='width:14%;background:#222d32;height:600px;' class='text-white float-left pl-md-4 rounded pb-md-3 ml-md-1'>
          
          <h3 class='  p-2'>Adminator</h3>

          <div class="content">
            <ul class='list-unstyled'>
            <li>
              <a href="#" style='text-decoration:none' class='text-white'> Dashboard</a>
            </li>
           
            @php 
            use App\TablePermission;
               $id = auth()->guard('admin')->user()->id;
                $permission = TablePermission::where('admin_id',$id)->get();
            @endphp
       

            @if(isset($permission)&& !is_null($permission))
             
              @foreach($permission as $key => $value)
                 @if($value->permission !='null')
                    <li class='pt-md-4'>
                      <div class="dropdown">
                        <button class="dropdown-toggle border-0 text-white text-capitalize pl-md-0 " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='background:none;outline:none'>
                        {{$value->table}}
                        </button>
                      
                          <div class="dropdown-menu " aria-labelledby="dropdownMenuButton " style='    min-width: fit-content;'>
                          @php  
                              $permissions = explode(',', $value->permission);
                              $permissions = str_replace("'",'',$permissions);
                              $permissions = str_replace("[",'',$permissions);
                              $permissions = str_replace("]",'',$permissions);
                          @endphp
                          @foreach($permissions as $perm)
                            <a class="dropdown-item text-capitalize" href="/admin/{{$value->table}}/{{$perm}}" style='color:cornflowerblue;'>{{$perm}}</a>
                          @endforeach  
                          
                          
                          </div>
                    </li> 
                 @endif
              @endforeach

               
            
           
             
             
              @endif
            </ul>
          </div>
          <!-- content -->

      </aside>
      <!-- End aside -->

      <div style='width:85%' class='float-right'>
          
          @yield('content')
         
      </div> <!-- section content -->
      
   
   </div> <!-- End contain_all -->
  
  
  
   
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
@yield('javascript')


</body>



</html>
