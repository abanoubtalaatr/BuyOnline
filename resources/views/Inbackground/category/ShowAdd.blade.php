@extends('Inbackground.admin.dashboard')


@section('content')
@include('Inbackground.category.master')


  <div class="col-md-8 text-white ml-md-3" style='padding: 20px;
    background: #235584;
    border-radius: 11px;'>
      <form action='{{route("category.add")}}' method='post'>
      @csrf
        <div class="form-group">
          <label for="formGroupExampleInput">Add Name for Category</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name of Category" name='categoryName'>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Number in Stock</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Number in Stock" name='count'>
        </div>
        
        <button type='submit' class='btn btn-primary mx-auto'>submit</button>
      </form>
  </div>

@stop