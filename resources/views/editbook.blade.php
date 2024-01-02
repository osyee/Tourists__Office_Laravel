
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Edit Booking</h1> </center>
@stop

@section('content')

<form method='post' action="{{route('update-book',['id'=>$book->id])}}">
    <center>
{{csrf_field()}}
<form class="row g-3">
  <div class="col-md-6">
  <label  class="form-label">Name</label>
  <input type="text" name='name' value="{{$book->customer->name}}" class="form-control" placeholder="Name"  />

  </div>
  <div class="col-md-6">
    <label  class="form-label">City</label>
    <input type="text" name='city' value="{{$book->ticket->city->name}}" class="form-control" placeholder="City"  readonly />

  </div>
  <div class="col-6">
    <label for="inputCompany" class="form-label">Company</label>
    <input type="text" class="form-control" name='company' value="{{$book->ticket->company->title}}" placeholder="Company" readonly />

  </div>

  <div class="col-md-6">
    <label for="input hotel" class="form-label">hotel</label>
    <select name='hotel' class="form-control">
    <option value='{{Null}}'> Null</option>
   
    @foreach($book->ticket->city->hotels as $hotel)
     <option  {{ $hotel->id== $book->hotel_id ? 'selected':"" }} value="{{$hotel->id}}">
    {{$hotel->name}} 
    </option>
      @endforeach

      </select>
  
  </div>


  <div class="col-md-6">
    <label for="inputDate" class="form-label">Date</label>

    <input type="text" name='date' value="{{$book->book_date}}" class="form-control" readonly/>

  </div>

 

  </br>
 <input type="submit" value="Edit Booking"  class="btn btn-primary mb-2" />
 </center>
 </form>



@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop