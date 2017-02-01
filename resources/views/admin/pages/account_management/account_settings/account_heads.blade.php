@extends('admin.master')

@section('title', 'account types')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.css">
<!-- toastr css -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/toastr/toastr.css">

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
        <div class="box">
            <div class="box-header">

            </div>
            <div class="box-body">
                <form role="form" method="post" action="{{url('save-account-heads')}}">
                    {{ csrf_field() }}

                    <div class="col-xs-3">
                        <div class="form-group">
                            <input class="form-control" type="text" name="head_name" placeholder="Add New Head">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <select name="head_category" class="form-control text-capitalize" required="">
                                <option selected disabled> Select Account Types </option>
                                @foreach($account_types as $v)
                                <option value="{{$v->id}}" class="text-capitalize"> {{$v->account_type_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add New Head</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box            ">
                    <div class="box-header">
                        <h3 class="box-title">Total Students : </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="view2" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Head Name</th>
                                    <th>Account Types</th>
                                    <th>Actions(inactive)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($account_heads as $v)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$v->head_name}}</td>
                                    <td class="text-capitalize">{{$v->AccountType->account_type_name }}</td>
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
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>              
        </div>
    </div>
</div>



<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- toastr script -->
<script src="{{asset('public/admin_assets')}}/plugins/toastr/toastr.min.js"></script>

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
</script>
<script type="text/javascript">
    function check_delete()
    {
    var chk = confirm("Are you sure to delete this ?");
    if (chk)
    {
    return true;
    }
    else{
    return false;
    }
    }
</script>
@endpush<!-- End additional Script-->
@endsection
