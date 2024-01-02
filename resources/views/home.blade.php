@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <h1>Ticket </h1> </center>
@stop

@section('content')
<form method='post' action="{{route('filtered-ticket')}}">
{{csrf_field()}}
<center>
City: <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='city'>
  <option selected>Open this select city</option>
  
  @foreach($city as $value){

<option value="{{$value->id}}">{{$value->name}}
</option>
}
@endforeach
</select>

Date Start:   <input type="text" name='date' /></br>
<input type="submit" value="Search"  class="btn btn-primary mb-2"/>
</center>
</form>
<center>
</br>
<ul>
<ul class="list-group">
  <li class="list-group-item active" aria-current="true">Ticket</li>
  @foreach($ticket as $value)
  <li class="list-group-item">

City :{{$value->city->name}}   Company: {{$value->company->title}}  Date Start: {{$value->date_s}}
<button type="button" class="btn btn light"><a href="{{route('delete',['id'=>$value->id])}}">DeleteTicket</a></button>  <button type="button" class="btn btn light"> <a href="{{route('add-book',['id'=>$value->id])}}">Booking now</a></button></li>
@endforeach</li>

</ul>



</center>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
