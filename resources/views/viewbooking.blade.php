@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <h1>Booking</h1> </center>
@stop

@section('content')

<form method="post" action="{{route('filter-book')}}">
{{csrf_field()}}
<center>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name='email' placeholder="Email Customer">
    </div>
    <div class="col">
      <input type="text" class="form-control" name='date' placeholder="Booking Date">
    </div>

  </div>
</br>
<input type="submit" value= "Search"  name="sumbit" class="btn btn-primary mb-2" />
</br>
</form>

<ul class="list-group">
@foreach($bookings as $key =>$value)
  <li class="list-group-item list-group-item-info">
    
     <div class="d-flex w-100 justify-content-between">
      Name Customer:{{$value->customer->name}}......
      City:{{$value->ticket->city->name}}....
       CompanyTitle:{{$value->ticket->company->title}}... In hotel:{{$value->hotel_id!==null ? $value->hotel->name : 'no hotel book'}}
      ......Booking Date:{{$value->book_date}}
      </div>
      <button type="button" class="btn btn light">
    <a href="{{route('edit',['id'=>$value->id])}}">Edit Book</a></button>
    <button type="button" class="btn btn light">
    <a href="{{route('delete_book',['id'=>$value->id])}}">Delete Book</a></button>
    
    

    </li>
  

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





