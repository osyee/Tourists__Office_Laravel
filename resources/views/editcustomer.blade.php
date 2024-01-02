@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Edit Customer</h1> </center>
@stop

@section('content')
<center>

<form method='post' action="{{route('update_customer',['id'=>$customer->id])}}">
{{csrf_field()}}
<form class="row g-3">
  <div class="col-md-6">
  <label  class="form-label">Name</label>
    <input type="text" class="form-control" name='name' placeholder="Name" value="{{$customer->name}}">
  </div>
  <div class="col-md-6">
  <label  class="form-label">mobile</label>
    <input type="text" class="form-control" name='mobile' placeholder="Mobile" value="{{$customer->mobile}}"/>
  </div>

  <div class="col-md-6">
    <label  class="form-label" >gender</label>
    <select name='gender' class="form-control"  >
    <option >male</option>
     <option >fmale</option>
    

      </select>
  
  </div>

  <div class="col-md-6">
  <label for="inputphone" class="form-label" >email</label>
    <input type="text" class="form-control" name='email' placeholder="Email" value="{{$customer->email}}" />
  </div>


<br/>
<input type="submit" value="UpdateCustomer" class="btn btn-primary mb-2">

</select></form>
</center>

@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop