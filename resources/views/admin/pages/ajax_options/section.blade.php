<option value="" selected disabled>Select Section</option>
@foreach($class_to_section as $v)
<option value="{{$v->id}}">{{$v->section_name}}</option>
@endforeach