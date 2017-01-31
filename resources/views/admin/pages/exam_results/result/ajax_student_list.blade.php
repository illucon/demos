@foreach($section_to_student as $v)
<option value="{{$v->id}}">{{$v->first_name}} {{$v->last_name}}</option>
@endforeach