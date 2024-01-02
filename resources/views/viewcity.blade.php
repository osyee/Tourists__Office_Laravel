@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>City</h1> </b></center>
@stop

@section('content')




<form method="post" action="{{route('cityfilter')}}">
{{csrf_field()}}
  <center>
<input type="submit" value="Search"  class="btn btn-info" />
<div class="row">

    <div class="col">
</br>
      <input type="text" class="form-control" name='name' placeholder="Name City">
    </div>


  </div>
</br>


<a href="{{route('add_city')}}">Add City</a>
</form>
<ul class="list-group">
<br/>
@foreach($city as $key =>$value)
<li class="list-group-item d-flex justify-content-between align-items-center">
Name :{{$value->name}} Country: {{$value->country}}  
<a href="{{route('update_city',['id'=>$value->id])}}">Edit</a>
<a href="{{route('city_view_by_ticket',['id'=>$value->id])}}">Tickets</a>

</li><br>
  </li>
  
</ul>

@endforeach
</ul>
</center>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop