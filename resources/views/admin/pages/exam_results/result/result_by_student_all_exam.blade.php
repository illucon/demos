 @extends('admin.master')

@section('title', 'Student Result')


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
            <h3 class="box-title text-bold"> Result By Student</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/') }}" method="post" role="form" id="">
            {{ csrf_field() }}
            <div class="box-body" id="">

                <div class="form-group col-md-4">
                    <label for="academic_years_id">Year</label>
                    <select name="academic_years_id" class="form-control" id="academic_years_id">
                        @foreach($academic_year as $v)
                        <option value="{{$v->id}}">{{$v->academic_year}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="class_names_id">Class</label>
                    <select name="class_names_id" class="form-control" id="class_names_id" onchange="ajax_view_option(this.value, '{{ url("/ajax-view-section") }}', '#section_names_id')" >
                        @foreach($class_name as $v)
                        <option value="{{$v->id}}">{{$v->class_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="section_names_id">Section</label>
                    <select name="section_names_id" class="form-control" id="section_names_id" onchange="ajax_view_option(this.value, '{{ url("/ajax-view-student") }}', '#students_id')">

                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="students_id">Student</label>
                    <select name="students_id" class="form-control" id="students_id" onchange="ajax_view_option(this.value, '{{ url("/ajax-view-single-student-result") }}', '#view_result')">
                    <option disabled>Select Section</option>
                    </select>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                
            </div>
        </form>
    </div>

</div>
<div class="row" id="view_result">


</div>

<!--End Main Content-->
@push('scripts')  <!-- additional Script-->

<script>
    function ajax_view_option(id, link, location1, location2=null, location3=null) {
    $.ajax({
    url: link,
            type:"GET",
            data: {"id":id},
            success: function(result){
            console.log(result);
            $(location1).html(result.res1);
            $(location2).html(result.res2);
            $(location3).html(result.res3);
            }
    });
    };
    
</script>
@endpush<!-- End additional Script-->
@endsection
