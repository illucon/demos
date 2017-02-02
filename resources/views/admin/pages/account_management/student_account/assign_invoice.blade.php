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
                <li class="active"><a href="#tab_4" data-toggle="tab">Assign Invoice to Students</a></li>
            </ul>
            <div class="tab-content">
                               <!--CLASS tab-->
                <div class="tab-pane active" id="tab_4">

                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <select name="select_class" class="form-control" required="" onchange="selected_class_students(this.value,'{{ url('ajax-selected-class-students') }}','#studentListTable')">
                                    <option selected disabled> Select Class Name </option>
                                    @if(isset($all_class_name))
                                    @foreach($all_class_name as $v)
                                    <option value="{{ $v->id }}"> {{ $v->class_name }} </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <select name="select_year" class="form-control" required="">
                                    <option selected disabled> Select Year </option>
                                    <option value="income"> 2017 </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">  Search Student </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <form role="form" method="post" id="generateStudentInvoice" action="{{url('generate-invoice-for-students')}}">
                            {{ csrf_field() }}
                            <div class="box ">
                                <div class="box-header">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="form-group">
                                                <label class="bold text-uppercase text-primary">Account Item to Assign * </label>
                                                <select name="select_account_item" id="selectItemsForInvoice" onchange="submit_button_enable(this.value)" class="form-control" required>
                                                    <option selected disabled> Select Account Item </option>
                                                    @foreach($object as $array)
                                                        @foreach($array as $v)
                                                            <option value="{{ $v->id }}"> {{ $v->account_item_name }}  </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="view2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Student Name</th>
                                                <th>SID</th>
                                                <th>Section Name</th>
                                                <th>Uncheck</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentListTable">
                                            
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="form-group pull-right">
                                        <button id="submitInvoicesStudents" class="btn btn-success" type="submit" form="generateStudentInvoice" style="margin-right: 80px">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                            </form>
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
document.getElementById("submitInvoicesStudents").disabled=true;
function submit_button_enable(value){
    if(value){
    document.getElementById("submitInvoicesStudents").disabled=false;
    }                        
}
</script>

<script>
function selected_class_students(value, link,des)
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

