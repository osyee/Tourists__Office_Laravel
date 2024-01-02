@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Add Customer</h1> </center>
@stop

@section('content')
<center>

<form method='post' action="{{route('store_customer')}}">
{{csrf_field()}}
<form class="row g-3">
  <div class="col-md-6">
  <label  class="form-label">Name</label>
    <input type="text" class="form-control" name='name' placeholder="Name">
  </div>
  <div class="col-md-6">
  <label  class="form-label">mobile</label>
    <input type="text" class="form-control" name='mobile' placeholder="Mobile" />
  </div>

  <div class="col-md-6">
    <label  class="form-label">gender</label>
    <select name='gender' class="form-control">
    <option >male</option>

     <option  > fmale</option>
    

      </select>
  
  </div>

  <div class="col-md-6">
  <label for="inputphone" class="form-label">email</label>
    <input type="text" class="form-control" name='email' placeholder="Email">
  </div>


<br/>
<input type="submit" value="AddCustomer" class="btn btn-primary mb-2">

</select></form>
</center>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop