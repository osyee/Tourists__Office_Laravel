@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Hotel</h1> </b></center>
@stop

@section('content')




<form method="post" >
{{csrf_field()}}
<center>
    <a  href="{{route('addHotel')}}">New Hotel</a>

<ul class="list-group">
<br/>
@foreach($hotel as $key =>$value)
  
  <li class="list-group-item d-flex justify-content-between align-items-center">
Name:{{$value->name}}   City:{{$value->City->name}}   Country:{{$value->City->country}} 

<a href="{{route('edit_hotel',['id'=>$value->id])}}">Edit Hotel</a>
 <a href="{{route('delete_hotel',['id'=>$value->id])}}">Delete Hotel</a>
 <a href="{{route('ratinghotel',['id'=>$value->id])}}">Rating Hotel</a>





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

