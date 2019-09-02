@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.admin.master')


  <div class="col-md-11 text-dark ml-md-3 clearfix" style='padding: 20px;background: #17a2b8;
    border-radius: 11px;'>
      <form action='{{route("admin.Create")}}' method='post'>
      @csrf

        <!-- this for contain first name ,last name ,email ,and password -->
        <div class="col-md-12 overflow-hidden">
           
       
            <h3 class='pl-md-3 text-white'>Add New Admin</h3>
            <hr class='pl-md-3 bg-warning'>


            <div class="col-md-12">
               @if(count($errors)>0)
                  @foreach($errors as $error)
                     <div class="alert alert-danger">
                     {{$error}}
                     </div>
                  @endforeach
               @endif
            </div>

            <div class="col-md-6 float-left form-group">
                <label for="">First Name</label>
                <input type="text" name='firstName' class='form-control' placeholder = 'First Name ' >
            
            
            </div>

            <div class="col-md-6 float-right form-group">
                <label for="">Last Name</label>
                <input type="text" name='lastName' class='form-control' placeholder = 'Last Name ' >
            </div>
           
            <div class="col-md-6 float-left form-group">
                <label for="">Email</label>
                <input type="email" name='email' class='form-control' placeholder = 'Email' >
            </div>

            <div class="col-md-6 float-right form-group">
                <label for="">Job Title</label>
                <select name="jobTitle" id="" class='form-control text-danger'>
                  <option value="" class=''>Choose</option>
                  <option value="Super Admin">Super Admin</option>
                  <option value="Admin">Admin</option>
                  <option value="Supervisior">Supervisior</option>
                </select>
            </div>

            <div class="col-md-6 float-left form-group">
                <label for="">Password</label>
                <input type="password" name='password' class='form-control' placeholder = 'Password' >
            </div>

            <div class="col-md-6 float-right form-group">
                <label for="">Confirm Password</label>
                <input type="password" name='confirmPassword' class='form-control' placeholder = 'Confirm Password' >
            </div>

        </div><!-- End col-md-12 -->

         <!-- ++++++++++++++++++++++++++++++++++-->
         <!-- this contain hr for seleprate-->

        <div class="col-md-12">
            <div class="col-md-12">
                <hr class='bg-warning' style='clear:both;'> 
            </div>
        </div><!-- End col-md-12 -->
        <!-- ++++++++++++++++++++++++++++++++++-->

        <!--- this contain header of permission and permission itself-->
        <div class="col-md-12">
           <div class="col-md-12">
                <h3 class='text-white'>Permission</h3>
                <hr class='bg-warning' style='clear:both;'> 
            </div>
            <!-- +++++++++++++++++++++++++++++ -->
            <!-- this for admin permission -->
            <div class="col-md-12 text-white overflow-hidden">
              <h5>Admin Permission</h5>

              <div class='pl-md-3'>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='admin[]' id='adminCreate' value='create'>
                    <label for="adminCreate">Create</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='admin[]' id='adminEdit' value='edit'>
                    <label for="adminEdit">Edit</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='admin[]' id='adminDelete' value='delete'>
                    <label for="adminDelete">Delete</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='admin[]' id='adminShow' value='show'>
                    <label for="adminShow">Show</label>
                 </div>
                
              </div>
              
            
            </div>
            <!-- End permission -->
             <!-- +++++++++++++++++++++++++++++ -->
             <hr>
            <!--  category permission -->
            <div class="col-md-12 text-white overflow-hidden">
              <h5>Category Permission</h5>

              <div class='pl-md-3'>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='cateogry[]' id ='categoryCreate' value='create'> 
                    <label for="categoryCreate">Create</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='category[]'id ='categoryEdit' value='edit'>
                    <label for="categoryEdit">Edit</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='category[]'id ='categoryDelete' value='delete'>
                    <label for="categoryDelete">Delete</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='category[]'id ='categoryShow' value='show'>
                    <label for="categoryShow">Show</label>
                 </div>
                
              </div>
              
            
            </div>
            <!-- End permission -->

            <hr>
            <!--  category permission -->
            <div class="col-md-12 text-white overflow-hidden">
              <h5>Product Permission</h5>

              <div class='pl-md-3'>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='product[]' id ='productCreate' value='create'>
                    <label for="productCreate">Create</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='product[]' id ='productEdit' value='edit'>
                    <label for="productEdit">Edit</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='product[]' id ='productDelete' value='delete'>
                    <label for="productDelete">Delete</label>
                 </div>

                 <div class='float-left mr-md-4'>
                    <input type="checkbox" name='product[]' id ='productShow' value='show'>
                    <label for="productShow">Show</label>
                 </div>
                
              </div>
              
            
            </div>
            <!-- End permission -->
            
        </div><!-- End col-md-12 -->
        <!-- this contain hr for seleprate-->

        <div class="col-md-12">
            <div class="col-md-12">
                <hr class='bg-warning' style='clear:both;'> 
            </div>
        </div><!-- End col-md-12 -->
            <!-- ++++++++++++++++++++++++++++++++++-->
        <div class="col-md-12 pb-md-2 pt-md-2">
          <div class="col-md-12 text-center">
            <div class='d-inline-block'>
              <button class='btn btn-danger' type='submit' style='font-size:20px;'>Submit</button>
            </div>
           
          </div>
        </div>
      </form> <!-- form -->
  </div>  <!-- col-md-11 -->
 

@stop