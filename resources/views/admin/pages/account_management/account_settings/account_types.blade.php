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
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title text-bold" style="margin-left: 20px">Add New Account Types</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ url('save-account-types') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-xs-4">
                        <input type="text" name="account_types_name" class="form-control" placeholder="account types name">
                    </div>                
                    <button type="submit" class="btn btn-success col-xs-2">Add Account Types</button>
                </form>

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title text-bold">Sections</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table id="table2" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Account Types</th>
                            <th>Action(inactive)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($account_types))
                        @foreach($account_types as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->account_type_name }}</td>
                            <td>
                                <a class="btn btn-default" data-toggle="modal" data-target="#edit_class" onclick="ajax_edit_view('{{ $v->id }}', '{{ url("/ajax-edit-view-".$v->id) }}', '#edit_class_view')"><span data-toggle="tooltip" data-placement="top" title="edit" class="glyphicon glyphicon-edit"></span></a>

                                <a class="btn btn-default" href="{{url('/delete-class-'.$v->id)}}" onclick="return confirm('Are you sure to delete this ?')"><span data-toggle="tooltip" data-placement="top" title="delete" class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

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
