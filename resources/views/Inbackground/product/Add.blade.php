@extends('admin.dashboard')

@section('content')
@include('Inbackground.product.master')
<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Add Name for Category</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name of Category">
  </div>
  
</form>
@stop