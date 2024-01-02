@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Add Hotel</h1> </b></center>
@stop

@section('content')
<center>



<form method="post"  action="{{route('update_hotel',['id'=>$hotel->id])}}">
{{ csrf_field() }}
<label>Hotel Name</label>
 <input type="text" placeholder="Name" name="name" class="form-control" value="{{$hotel->name}}">
<br>
<label>City</label>
 <input type="text" placeholder="city" name="city" class="form-control" value="{{$hotel->City->name}}">
<br>
<input type="submit" value="seve" class="btn btn-primary mb-2">

</form>
</center>
@stop
</center>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop