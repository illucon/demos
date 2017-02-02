<option selected disabled>Select Student</option>
@foreach($section_wise_students as $v)
<option value="{{$v->id}}">{{ $v->first_name.' '.$v->last_name }}</option>
@endforeach