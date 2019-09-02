@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.admin.master')


  <div class="col-md-11 text-dark ml-md-3 " style='padding: 20px;
    background: #d7ecff42;font-weight: bold;
    border-radius: 11px;'>
      <form action='{{route("admin.Update")}}' method='post' enctype="multipart/form-data">
             
          
              @csrf
              <input type="hidden" value="{{$Admin->id}}" name='id'>

              <div class="col-md-12" style='overflow:hidden'>
                
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput1">First Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="First Name" name='firstName' value="{{$Admin->firstName}}">
                </div>
               
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput2">Last Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Last Name" name='lastName'  value="{{$Admin->lastName}}">
                </div>

              </div> 
              <!-- +++++++++++++++++++++++++++++++++++++++ -->

              <div class="col-md-12"style='overflow:hidden'>

                <div class="form-group col-md-6 float-left" style='overflow:hidden'>
                  <label for="formGroupExampleInput5">Email</label>
                  <input type="email" class="form-control" id="formGroupExampleInput5" placeholder="Email" name='discount'  value="{{$Admin->email}}">
                </div>
               
                <div class="form-group col-md-6 float-left">
                  <label for="formGroupExampleInput7">Job Title</label>
                  <select name="jobTitle" id="" class='form-control text-danger'>
                    <option value="" class=''>Choose</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
                    <option value="Supervisior">Supervisior</option>
                    </select>
                </div>
                
              </div>
   

            
             
        
        <div class="col-md-12 border-top pt-md-2 text-center" style='overflow:hidden'>
           <button type='submit' class='btn btn-primary w-25' >submit</button>
        </div>
      </form>
  </div>

@stop

@section('javascript')



@stop
