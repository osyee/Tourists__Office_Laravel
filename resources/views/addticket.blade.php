@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Add Ticket</h1> 
@stop

@section('content')


<form method='post' action="{{route('creat-tick')}}">
<center>
{{csrf_field()}}
<div class="col-md-6">
    <label for="input company" class="form-label">company</label>
    <select name='company' class="form-control">
    @foreach($company as $value)
    <option value="{{$value->id}}">
    {{$value->title}} 
    </option>
    @endforeach
     </select>
    </div>

    <div class="col-md-6">
    <label for="input city" class="form-label">City</label>
    <select name='city' class="form-control">
    @foreach($city as $value)
    <option value="{{$value->id}}">
    {{$value->name}} 
     </option>
     @endforeach

     </select>
    </div>
    <div class="col-md-6">
    <label for="inputDateStart" class="form-label">DateStart</label>
    <input type="text" class="form-control" name='date_s' >
    </div>
    
    <div class="col-md-6">
    <label for="inputDateStart" class="form-label">DateEnd</label>
    <input type="text" class="form-control" name='date_e' >
    </div>
</br>
<input type="submit" value="AddTicket" class="btn btn-primary mb-2">
</div>

</center></form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
