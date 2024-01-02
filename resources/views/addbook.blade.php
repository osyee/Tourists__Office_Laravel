@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Booking Ticket</h1> </center>
@stop

@section('content')

<form method='post' action="{{route('create-book',['id'=>$ticket->id])}}">
    <center>
{{csrf_field()}}
<form class="row g-3">
  <div class="col-md-6">
  <label for="inputEmail" class="form-label">Email</label>
    <input type="text" class="form-control" name='email' placeholder="Email">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" name='city'  value="{{$ticket->city->name}}"class="form-control" placeholder="City"  readonly >
  </div>
  <div class="col-6">
    <label for="inputCompany" class="form-label">Company</label>
    <input type="text" class="form-control" name='company' value="{{$ticket->company->title}}" class="form-control"  placeholder="Company" readonly>
  </div>

  <div class="col-md-6">
    <label for="input hotel" class="form-label">hotel</label>
    <select name='hotel' class="form-control">
    <option value='{{Null}}'>Null </option>
    @foreach($ticket->city->hotels as $hotel)
     <option value="{{$hotel->id}}">
    {{$hotel->name}} 
     </option>
     @endforeach

      </select>
  
  </div>


  <div class="col-md-6">
    <label for="inputDate" class="form-label">Date</label>
    <input type="text" class="form-control" name='date' value="{{$ticket->date_s}}" readonly/>
  </div>

 

</br>
<input type="submit" value="Add Booking"  class="btn btn-primary mb-2" />
</center>
</form>



@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop