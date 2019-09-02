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

                     

                      <button class="btn btn-warning mr-md-3" onclick ="window.location='/admin/category/edit/{{$category->id}}'">
                        <i class='fas fa-edit'></i>
                        <span>Edit</span>
                      </button>

                      
                    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 
 
 </div>
@stop