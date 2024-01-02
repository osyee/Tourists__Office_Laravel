@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Company</h1> </b></center>
@stop

@section('content')




<form method="post" action="{{route('compfilter')}}">
{{csrf_field()}}
  <center>
<input type="submit" value="Search"  class="btn btn-info" />
<div class="row">

    <div class="col">
</br>
      <input type="text" class="form-control" name='title' placeholder="Title Company">
    </div>
    <div class="col">
</br>
      <input type="text" class="form-control" name='address' placeholder="Address">
    </div>

  </div>
</br>


<a href="{{route('add_company')}}">Add Company</a>
</form>
<ul class="list-group">
<br/>
@foreach($company as $key =>$value)
<li class="list-group-item d-flex justify-content-between align-items-center">
Name Company:{{$value->title}} Address: {{$value->address}}  
<span class="badge badge-primary badge-pill">Phone:{{$value->phone}}</span>
<a href="{{route('edit_company',['id'=>$value->id])}}">Edit Company</a>
 <a href="{{route('delete_company',['id'=>$value->id])}}">Delete Company</a>
 <a href="{{route('company_view_by_ticket',['id'=>$value->id])}}"> Tickets</a>

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

