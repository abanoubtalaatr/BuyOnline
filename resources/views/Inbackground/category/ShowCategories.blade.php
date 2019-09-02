@extends('Inbackground.admin.dashboard')


@section('content')

@include('Inbackground.category.master')

 <div class="col-md-12 p" >

    <table class="table text-center " style='background: aliceblue;'>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name </th>
                <th scope="col">The Count in Stock</th>
                <th scope="col">Created At</th>
                <th scope="col">Control</th>
            </tr>
        </thead>
        <tbody>

           @foreach($AllCategory as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->NumberInStock}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>

                      <button class='btn btn-primary mr-md-3' onclick="window.location = '/admin/product/create'">
                        <i class='fas fa-plus'></i>
                        <span>Add Product</span>
                      </button> 

                      <button class="btn btn-warning  mr-md-3"onclick="window.location = '/admin/category/edit/{{$category->id}}'">
                        <i class='fas fa-edit'></i>
                        <span>Edit</span>
                      </button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong{{$category->id}}">
                          <i class='fas fa-trash-alt'></i>
                          <span>Delete</span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$category->id}}" aria-hidden="true">
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
                                    are you sure you want to delete =>  <strong>{{$category->name}}</strong> 
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                <button type="button" class="btn btn-danger"onclick="window.location = '/admin/category/delete/{{$category->id}}'">Yes</button>
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