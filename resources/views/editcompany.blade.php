@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Edit Company</h1> </center>
@stop

@section('content')
<center>

<form method='post' action="{{route('update-company',['id'=>$comp->id])}}">
{{csrf_field()}}

<form class="row g-3">
  <div class="col-md-6">
  <label for="inputTitle" class="form-label">Title</label>
    <input type="text" class="form-control" name='title' placeholder="Title" value="{{$comp->title}}">
  </div>
  <div class="col-md-6">
  <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" name='address' placeholder="address" value="{{$comp->address}}">
  </div>
  <div class="col-md-6">
  <label for="inputphone" class="form-label">Phone</label>
    <input type="text" class="form-control" name='phone' placeholder="phone" value="{{$comp->phone}}">
  </div>
<br/>
<input type="submit" value="UpdateCompany" class="btn btn-primary mb-2">

</select></form>

</center>





@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


