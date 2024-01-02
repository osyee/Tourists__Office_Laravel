<form method='post' action="{{route('create-book')}}">
{{csrf_field()}}
email:<input type="text" name='email' value=""   /></br>
city:<select>
<option value="">not book</option>
@foreach($city as $v){
<option value="$v->id">{{$v->name}}</option>

}
@endforeach
</select>
</form>
