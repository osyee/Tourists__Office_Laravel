@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Add City</h1> </center>
@stop

@section('content')
<center>

<form method='post' action="{{route('creat-city')}}">
{{csrf_field()}}
<form class="row g-3">
  <div class="col-md-6">
  <label class="form-label">Name</label>
    <input type="text" class="form-control" name='name' placeholder="Name">
  </div>
  <div class="col-md-6">
  <label  class="form-label">Country</label>
    <input type="text" class="form-control" name='country' placeholder="country">
  </div>
<br/>
<input type="submit" value="AddCity" class="btn btn-primary mb-2">

</select></form>

</center>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop