@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Hotel</h1> </b></center>
@stop

@section('content')

{{csrf_field()}}
<center>

<ul class="list-group">
<br/>
@foreach($custrate as $key =>$value)
  
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Rate:{{$value->rate}}
    <button type="button" class="btn btn light">


  </li></ul>

@endforeach

@stop
</center>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

