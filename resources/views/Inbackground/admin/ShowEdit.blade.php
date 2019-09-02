@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.admin.master')
@php 
    use App\Admin;
    $Admins = Admin::all();
@endphp

 <div class="col-md-12 p" >

    <table class="table " style='background: aliceblue;'>
          <thead>
              <tr>
                
                  <th scope="col">First Name </th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Job Title</th>
                  <th scope="col">Email</th>
                  <th scope="col" class='text-center'>Control</th>
              </tr>
          </thead>
          <tbody>
          @foreach($Admins as $Admin)
                <tr>                    
                    <td>{{$Admin->firstName}}</td>
                    <td>{{$Admin->lastName}}</td>
                    <td>{{$Admin->jobTitle}}</td>
                    <td>{{$Admin->email}} </td>
                    <td class='text-center'>
                      <button class="btn btn-warning mr-md-3" onclick ="window.location='/admin/admin/edit/{{$Admin->id}}'">
                          <i class='fas fa-edit'></i>
                          <span>Edit</span>
                        </button>

                    </td>
                 </tr> 

            @endforeach      
            </tbody>      
 
 </div>
@stop