@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Customer</h1> </b></center>
@stop

@section('content')




<form method="post" action="{{route('filter_custom')}}">
{{csrf_field()}}
  <center>
<input type="submit" value="Search"  class="btn btn-info" />
<div class="row">
 <div class="col">
</br>
      <input type="text" class="form-control" name='email' placeholder="Email">
    </div>

  </div>
</br>


<a href="{{route('add_customer')}}">Add Customer</a>
</form>
<ul class="list-group">
<br/>
@foreach($customer as $key =>$value)
<li class="list-group-item d-flex justify-content-between align-items-center">
Name Customer:{{$value->name}} gender: {{$value->gender}}  
<span class="badge badge-primary badge-pill">Mobile:{{$value->mobile}}</span>
Email:{{$value->email}}
<a href="{{route('edit_customer',['id'=>$value->id])}}">Edit Customer</a>
 
 <a href="{{route('customrating',['id'=>$value->id])}}">Hotel</a>

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

