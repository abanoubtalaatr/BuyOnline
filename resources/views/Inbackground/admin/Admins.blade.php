@extends('Inbackground.admin.dashboard')


          
@section('content')

@include('Inbackground.admin.master')

 <div class="col-md-12 p" >

    <table class="table text-center " style='background: aliceblue;'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name </th>
                <th scope="col">Last Name </th>
                <th scope="col">Email</th>
                <th scope="col">Control</th>
            </tr>
        </thead>
        <tbody>
        @php 
          use App\Admin;
          $Admins = Admin::all();
        @endphp
           @foreach($Admins as $Admin)
                <tr>
                    <th scope="row">{{$Admin->id}}</th>
                    <td>{{$Admin->firstName}}</td>
                    <td>{{$Admin->lastName}}</td>
                    <td>{{$Admin->email}}</td>
                    <td>


                      <button class="btn btn-warning  mr-md-3"onclick="window.location = '/admin/admin/edit/{{$Admin->id}}'">
                        <i class='fas fa-edit'></i>
                        <span>Edit</span>
                      </button>

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
                                <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
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
                                <button type="button" class="btn btn-danger"onclick="window.location = '/admin/admin/delete/{{$Admin->id}}'">Yes</button>
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