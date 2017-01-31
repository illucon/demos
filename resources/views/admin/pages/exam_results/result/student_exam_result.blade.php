@extends('admin.master')

@section('title', 'Section Exam Result')


@section('main-content')    


@push('css')     <!-- additional css-->
@endpush         <!-- end additional css-->


<!--Start main Content-->
@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{ session('success') }}
</div>
@endif
@if(session('delete'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{ session('delete') }}
</div>
@endif

<div class="row">

    <div class="box box-primary" id="add_grade">
        <div class="box-header with-border">
            <h3 class="box-title text-bold"> Student Exam Result</h3>
        </div>
        <!-- /.box-header -->
            <div class="box-body" id="add_grade_form">

        <table class="table table-bordered" style="background: lightgrey;">
            <tr>
                <th>Student Name</th>
                <th>: {{$student->first_name}} {{$student->last_name}}</th>

                <th>Class</th>
                <th>: {{$student->ClassName->class_name}}</th>

                <th>Section</th>
                <th>: {{$student->SectionName->section_name}}</th>
            </tr>
            <tr>
                <th>SID</th>
                <th>: {{$student->sid}}</th>
                <th>Exam Name</th>
                <th>{{$single_exam_marks->first()->ExamName->exam_name}}</th>
            </tr>
        </table>

        <table class="table table-bordered" style="background: lightgrey;">
            <tr>
                <td>
                    <table class="table table-bordered" style="background: lightgrey;">
                        <tr>
                            <th>Subjects</th>
                            <th>Marks(Wr-Or-T1-T2)</th>
                            <th>Sub Total</th>
                            <th>Grade Point</th>
                        </tr>
                        @foreach($single_exam_marks as $v)
                        <tr>
                            <td>{{$v->Subject->subject_name}}</td>
                            <td>{{$v->written_mark.'-'.$v->oral_mark.'-'.$v->t1_mark.'-'.$v->t2_mark }}</td>
                            <td>{{$v->total_mark}}</td>
                            <td>{{$v->grade_point}}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
                <td>
                    <table class="table table-bordered" style="background: lightgrey;">
                        <tr>
                            <th>Total</th>
                            <th>Grade(Grade Point)</th>
                        </tr>
                        <tr>
                            <td>{{$single_exam_marks->sum('total_mark')}} </td>
                            <td>
                                <?php 
                                if($single_exam_marks->contains('grade_point', '0')){
                                    echo 'F(0.00)';                                    
                                } else {
                                    $grade_point= $single_exam_marks->avg('grade_point');
                         // ======================calculating Grade
                                switch (true) {
                                case ($grade_point >= 5 ):
                                    $grade="A+";
                                    break;
                                case ($grade_point < 5 && $grade_point >= 4 ):
                                    $grade="A";
                                    break;
                                case ($grade_point < 4 && $grade_point >= 3.5 ):
                                    $grade="A-";
                                    break;
                                case ($grade_point < 3.5 && $grade_point >= 3 ):
                                    $grade="B";
                                    break;
                                case ($grade_point < 3 && $grade_point > 0 ):
                                    $grade="C";
                                    break;
                                case ($grade_point == 0 ):
                                    $grade="F";
                                    break;
                                     };
                                  echo $grade.'('.$grade_point.')';
                                };
                                 ?>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

            </div>
        <!-- /.box-body -->

            <div class="box-footer">
                
            </div>
    </div>

</div>
<div class="row" id="view_marks">
    
</div>

<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
@endpush<!-- End additional Script-->
@endsection
