@foreach($info_students as $v)
<tr>
    <td> {{ $loop->iteration }} </td>
    <td> {{ $v->first_name." ".$v->last_name }} </td>
    <td> {{ $v->sid }} </td>
    <td> {{ $v->SectionName->section_name }} </td>
    <td  class="text-center">
        <label>
            <input name="checked_student[]" value="{{ $v->id }}" type="checkbox" class="flat-red" checked>
        </label>
    </td>
    <script>
        //Flat green color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>
    
</tr>
@endforeach

