@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Add Company</h1> </center>
@stop

@section('content')
<center>

<form method='post' action="{{route('creat-company')}}">
{{csrf_field()}}
<form class="row g-3">
  <div class="col-md-6">
  <label for="inputTitle" class="form-label">Title</label>
    <input type="text" class="form-control" name='title' placeholder="Title">
  </div>
  <div class="col-md-6">
  <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" name='address' placeholder="address">
  </div>
  <div class="col-md-6">
  <label for="inputphone" class="form-label">Phone</label>
    <input type="text" class="form-control" name='phone' placeholder="phone">
  </div>
<br/>
<input type="submit" value="AddCompany" class="btn btn-primary mb-2">

</select></form>

</center>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop