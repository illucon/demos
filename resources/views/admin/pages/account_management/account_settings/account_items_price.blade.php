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
                <li class="active"><a href="#tab_1" data-toggle="tab">Assign Price to Account Item</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <form role="form" method="post" action="{{url('save-account-item-amount')}}">
                            {{ csrf_field() }}

                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="account_type" class="form-control text-capitalize" required onchange="account_type_view(this.value,'{{ url('account-head-selection') }}', '#SelectAccountHead')">
                                        <option selected disabled> Select Account Types </option>
                                        @foreach($account_types as $v)
                                        <option value="{{ $v->id }}"> {{ $v->account_type_name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="account_head" id="SelectAccountHead" onchange="account_head_view(this.value,'{{ url('ajax-account-head-view') }}','#AccountItemName')" class="form-control" required="">
                                        <option selected disabled> Select Account Head </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <select name="account_item" id="AccountItemName" class="form-control" required="">
                                        <option selected disabled> Select Account Item </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="form-group">
                                    <input class="form-control" name="amount" type="number" required="" placeholder="Cost / Price">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success pull-right" style="margin: 0px 20px 15px 0px">Assign Amount</button>
                        </form>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Total Students : </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="view2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Item Name</th>
                                                <th>Amount</th>
                                                <th>Created By</th>
                                                <th>Date</th>
                                                <th>Action(inactive)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($account_items))
                                            @foreach($account_items as $v)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $v->account_item_name }}</td>
                                                <td>{{ $v->account_item_price }}</td>
                                                <td>{{ $v->created_by }}</td>
                                                <td>
                                                    <?php 
                                                    $date = strtotime($v->created_at);
                                                    $custom_date = date('d - F - Y');
                                                    echo $custom_date;
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-default" href="#edit_head_item" data-toggle="modal" onclick="edit_head_item('{{$v->id}}','{{url('/ajax-edit-head-item')}}')">
                                                        <span data-toggle="tooltip" data-placement="top" title="edit" class="glyphicon glyphicon-edit">
                                                        </span>
                                                    </a>
                                                    <a class="btn btn-default" href="#delete_head_item" data-toggle="modal" onclick="delete_head_item('{{$v->id}}','{{url('/ajax-delete-head-item-view')}}')">
                                                        <span data-toggle="tooltip" data-placement="top" title="delete" class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>              
                    </div>

                </div>
                <!-- /.tab-pane -->

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
function account_type_view(value, link,des)
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
function account_head_view(value, link,des)
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

