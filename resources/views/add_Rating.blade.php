@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <center> <b><h1>Add Rating</h1> </b></center>
@stop

@section('content')




<form method="post" action="{{route('store-rate',['id'=>$id])}}">
{{csrf_field()}}
<center>
<div class="col-6">
    <label  class="form-label">Email</label>
    <input type="text" class="form-control" name='email'  class="form-control"  placeholder="Email" >
  </div>
</br>
</br>




<div class="col-md-2">

    <label  class="form-label">hotel Rating</label>
    <select name='rate' class="form-control">
        @for($i=0;$i<=10;$i++)
    <option value='{{$i}}'>{{$i}} </option>
 
    @endfor
      </select>
     
      </div>
      <div class="form-group col-md-9" >
     <label for="comment">Comment:</label>
    <textarea class="form-control" rows="9" id="comment" name="comment" value=""></textarea>
     </div>
     
     <input type="submit" value="AddRating" class="btn btn-primary mb-2">


@stop
</center>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop