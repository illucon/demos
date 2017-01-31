<table class="table table-hover" style="background: lightgreen;">
    <tr>
        <th>Class</th>
        <th>:{{$students->first()->ClassName->class_name}}</th>
        <th>Section</th>
        <th>:{{$students->first()->SectionName->section_name}}</th>
        <th>Year</th>
        <th>:{{$students->first()->academic_year}}</th>
    </tr>
    <!-- <tr>
        <th>Subject</th>
        <th>:{{--$ajax_marks_by_section->first()->Subject->subject_name--}}</th>
        <th>Exam Name</th>
        <th>:{{--$ajax_marks_by_section->first()->ExamName->exam_name--}}</th>
    </tr> -->
</table>
<table class="table table-hover table-striped">
@if($ajax_marks_by_section->count() > 0 )
    <tr>
        <th>SN</th>
        <th>SID</th>
        <th>Student Name</th>
        <th>Written Mark</th>
        <th>Oral Mark</th>
        <th>T1 Mark</th>
        <th>T2 Mark</th>
        <th>Total</th>
        <th>GP</th>
    </tr>
    @foreach($ajax_marks_by_section as $v)
    <tr>
        <td>SN</td>
        <td>{{ $v->Student->sid}}</td>
        <td>{{ $v->Student->first_name}} {{$v->Student->last_name }}</td>
        <td>{{$v->written_mark}}</td>
        <td>{{$v->oral_mark}}</td>
        <td>{{$v->t1_mark}}</td>
        <td>{{$v->t2_mark}}</td>
        <td>{{$v->total_mark}}</td>
        <td>{{$v->grade_point}}</td>
    </tr>
    @endforeach
    @else
    NO records here 
    <input type="submit" form="mark_entry" class="btn btn-primary" id="btn"  value="Entry Marks"/>
    @endif
</table>

<!--parseFloat("10")-->