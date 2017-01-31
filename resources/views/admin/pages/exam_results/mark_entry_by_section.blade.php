@extends('admin.master')

@section('title', 'Student List')


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

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title text-bold">Exams List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <div class="col-md-8 text-bold">
                <table class="table">
                    <tr>
                        <td>Class</td>
                        <td>: {{ $class->class_name }}</td>
                        <!--<input type="hidden" name="class_names_id"  value="{{$class->id}}"/>-->
                        <td>Exam Name </td>
                        <td>: {{ $exam_name->exam_name }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td>:  {{$section->section_name}}</td>
                        <!--<input type="hidden" name="subjects_id"  value="{{$subject->id}}"/>-->
                        <td>Year</td>
                        <td>: {{ $year->academic_year }}</td>
                        <!--<input type="hidden" name="academic_years_id"  value="{{$year->id}}"/>-->
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>    
        </div>
        <div class="col-md-12">
            <table class="table table-bordered" style="background: lightgrey;">
                <tr>
                    <th>Subject</th>
                    <th>: {{ $subject->subject_name }}</th>
                    <th>Written Mark</th>
                    <th>: {{ $subject->written_mark }}</th>
                    <th>Oral Mark</th>
                    <th>: {{ $subject->oral_mark }}</th>
                    <th>T1 Mark</th>
                    <th>: {{ $subject->t1_mark }}</th>
                    <th>T2 Mark</th>
                    <th>: {{ $subject->t2_mark }}</th>
                    <th>Total</th>
                    <th>{{ $subject->written_mark + $subject->oral_mark + $subject->t1_mark + $subject->written_t2_mark }}</th>
                </tr>
            </table>            
        </div>


        <form action="{{url('/save-mark-entry-by-section')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="exam_names_id"  value="{{$exam_name->id}}"/>
            <input type="hidden" name="subjects_id"  value="{{$subject->id}}"/>

            @if($students->count() > 0)
            <table class="table table-hover table-striped">
                <tr>
                    <th>SN</th>
                    <th>Roll</th>
                    <th>Student Name</th>
                    <th>Written Mark</th>
                    <th>Oral Mark</th>
                    <th>T1 Mark</th>
                    <th>T2 Mark</th>
                </tr>
                @foreach($students as $v)
                <tr>
                    <td>SN</td>
                    <td>Roll</td>
                    <td>{{ $v->first_name}} {{$v->last_name }}</td>
                <input type="hidden" name="students_id[]" value="{{ $v->id }}"/>
                <td><input type="text" name="written_mark[]"/></td>
                <td><input type="text" name="oral_mark[]"/></td>
                <td><input type="text" name="t1_mark[]"/></td>
                <td><input type="text" name="t2_mark[]"/></td>
                </tr>
                @endforeach
                <input type="hidden" name="total" value="{{count($students)}}"/>
            </table>
            <button class="btn btn-success">SUBMIT</button>
            @else
            <div class="text-danger text-bold">No records here</div>
            @endif
        </form>
    </div>
    <!-- /.box-body -->

</div>


</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->

@endpush<!-- End additional Script-->
@endsection
