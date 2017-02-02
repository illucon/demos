@extends('admin.master')

@section('title', 'Account Settings')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/datatables/dataTables.bootstrap.css')}}">
<!-- toastr css -->
<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/toastr/toastr.css')}}">

<link rel="stylesheet" href="{{asset('public/admin_assets/plugins/iCheck/all.css')}}">

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
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_2" data-toggle="tab">Receive Payments </a></li>
            </ul>
            <div class="tab-content">
                               <!--CLASS tab-->
                <div class="tab-pane active" id="tab_2">
                    <br/>
                    <div class="row">
<!--                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select id="SelectAcademicYear" class="form-control">
                                        <option selected disabled> Select Academic Year </option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="select_class" class="form-control text-capitalize" onchange="section_selection(this.value,'{{ url('ajax-section-view') }}', '#SelectClassSection')">
                                        <option selected disabled> Select Class </option>
                                        @foreach($all_classes as $v)
                                        <option  value="{{ $v->id }}"> {{ $v->class_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="select_section" id="SelectClassSection" class="form-control text-capitalize" onchange="student_selection(this.value,'{{ url('ajax-student-view') }}', '#SelectStudent')">
                                        <option selected disabled> Select Section</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="select_student" id="SelectStudent" class="form-control text-capitalize" onchange="student_id_find(this.value,'{{ url('ajax-student-id-find') }}', '#StudentIdFind')">
                                        <option selected disabled> Select Student</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group" id="StudentIdFind">
                                    <input name="student_sid" type="text" placeholder="Student SID" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-3 pull-right">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" onclick="student_invoices_info(document.getElementById('SelectStudent').value,'{{ url('ajax-student-invoices-info') }}', '#StudentInvoicesTable')">Search</button>
                                </div>
                            </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Student Invoices : </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" id="StudentInvoicesTable">
                                    
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>              
                    </div>


                </div>
           
                <!--end CLASS tab-->
            </div>
        </div>
    </div>
</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- toastr script -->
<script src="{{asset('public/admin_assets')}}/plugins/toastr/toastr.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/iCheck/icheck.min.js"></script>

<script>
function section_selection(value, link,des)
{
$.ajax({
    url: link,
    type:"GET", 
    data: {"data":value}, 
    success: function(result){
        console.log(result);
        $(des).html(result.response);
        }
});
}
function student_selection(value, link,des)
{
$.ajax({
    url: link,
    type:"GET", 
    data: {"data":value}, 
    success: function(result){
        console.log(result);
        $(des).html(result.response);
        }
});
}
function student_id_find(value, link,des)
{
$.ajax({
    url: link,
    type:"GET", 
    data: {"data":value}, 
    success: function(result){
        console.log(result);
        $(des).html(result.response);
        }
});
}
function student_invoices_info(value, link,des)
{
$.ajax({
    url: link,
    type:"GET", 
    data: {"data":value}, 
    success: function(result){
        console.log(result);
        $(des).html(result.response);
        }
});
}
</script>
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
    $(function () {
    $("#table1").DataTable();
    $('#table2').DataTable({
    "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true
    });
    });
<script type="text/javascript">
    function check_delete()
    {
    var chk = confirm("Are you sure to delete this ?");
    if (chk)
    {
    return true;
    } else {
    return false;
    }
    }
</script>
@endpush<!-- End additional Script-->
@endsection

