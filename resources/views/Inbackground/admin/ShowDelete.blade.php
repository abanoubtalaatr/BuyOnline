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
               
                <th scope="col">Frist Name  </th>
                <th scope="col">Last Name</th>
                <th scope='col'>Job Title</th>
                <th scope="col">Email</th>
                <th scope="col" class='text-center'>Control</th>
            </tr>
        </thead>
        <tbody>



           @foreach($Admins as $Admin)
                <tr>
                    
                    <td class='text-capitalize'>{{$Admin->firstName}}</td>
                    <td class='text-capitalize'>{{$Admin->lastName}}</td>
                    <td> {{$Admin->jobTitle}} </td>
                    <td>{{$Admin->email}} </td>
                    <td class='text-center'>
                                   <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong{{$Admin->id}}">
                                <i class='fas fa-trash-alt'></i>
                                <span>Delete</span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong{{$Admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$Admin->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style='background: whitesmoke;'>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle{{$Admin->id}}">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="alert alert-danger m-0">
                                            are you sure you want to delete =>  <strong>{{$Admin->firstName}} {{$Admin->lastName}}</strong> 
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location ='/admin/admin/delete/{{$Admin->id}}'">Yes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 
 
 </div>
@stop