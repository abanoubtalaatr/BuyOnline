@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.category.master')


  <div class="col-md-8 text-white ml-md-3" style='padding: 20px;
    background: #235584;
    border-radius: 11px;'>
      <form action='{{route("category.update")}}' method='post'>
      @csrf
        <input type="hidden" name='id' value="{{$category->id}}">
        <div class="form-group">
          <label for="formGroupExampleInput">Edit Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Edit The Name " name='categoryName' value="{{$category->name}}">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Edit Count In Stock</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Edit Count" name='count' value="{{$category->NumberInStock}}">
        </div>
        
        <button type='submit' class='btn btn-primary mx-auto'>submit</button>
      </form>
  </div>

@stop