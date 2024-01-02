@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Hotel</h1> </b></center>
@stop

@section('content')

{{csrf_field()}}
<center>
<a href="{{route('add_rating',['id'=>$id])}}">Add_Rating</a></button>
<ul class="list-group">
<br/>
@foreach($hotelrating as $key =>$value)
  
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Name:{{$value->customer->name}}
    <button type="button" class="btn btn light">
    <a href="{{route('edit_rating',['id'=>$value->id])}}">edit_Rating</a></button>


    <center> Rating  :{{$value->rate}} && Comment:{{$value->comment}}</center> 






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

