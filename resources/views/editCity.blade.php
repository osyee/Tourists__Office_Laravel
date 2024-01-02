
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center> <h1>Edit City</h1> </center>
@stop

@section('content')

<form method='post' action="{{route('update_city',['id'=>$city->id])}}">
    <center>
{{csrf_field()}}

<label for="inputCompany" class="form-label">Name</label>
<input type="text" class="form-control" name='name' value="{{$city->name}}" placeholder="name"  />

<label for="inputCompany" class="form-label">Country</label>
<input type="text" class="form-control" name='country' value="{{ $city->country }}" placeholder="country"  />

  </br>
 <input type="submit" value="Edit City"  class="btn btn-primary mb-2" />
 </center>
 </form>





@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop