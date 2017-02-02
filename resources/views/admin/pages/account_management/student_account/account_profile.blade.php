@extends('admin.master')

@section('title', 'Student Profile')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.css">
@endpush         <!-- end additional css-->

<div class="row">
    <div class="col-xs-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="col-xs-6">
                    <img src="{{asset('public/student_image/user.png')}}" alt="Profile Picture" class="img-responsive img-rounded">
                </div>
                <div class="col-xs-5">
                    <h3>Student Name : <span class="text-info">{{ $student_info->first_name.' '.$student_info->last_name }}</span> </h3>
                    <h3>Student ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span class="text-info">{{ $student_info->sid }}</span></h3>
                    <table class="table">
                        <?php
                        $all_receivalbe = 0;
                        $all_paid_taka = 0;
                        foreach ($invoices as $v) {
                            $all_receivalbe += $v->receivable_amount;
                            $all_paid_taka += $v->paid_amount;
                            
                        }
                        ?>
                        <tr>
                            <th>Total Receivable: </th>
                            <td><span style="color: blue"> {{ $all_receivalbe }} </span> TK </td>
                        </tr>
                        <tr>
                            <th>Total Paid : </th>
                            <td><span style="color: green"> {{ $all_paid_taka }} </span> TK </td>
                        </tr>
                        <tr>
                            <th>Total Due :</th>
                            <td><span style="color: red"> {{ $all_receivalbe - $all_paid_taka }} </span> TK </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Responsive Hover Table</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>SL</th>
                        <th>Transaction Date</th>
                        <th>Created By</th>
                        <th>Account Item Name</th>
                        <th>Receivable Amount</th>
                        <th>Paid Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($invoices as $v)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <?php $date = strtotime($v->created_at); echo date('d-F-Y',$date); ?>
                        </td>
                        <td>{{ $v->created_by }}</td>
                        <td> {{ $v->AccountItem->account_item_name }} </td>
                        <td> {{ $v->receivable_amount }} </td>
                        <td> {{ $v->paid_amount }} </td>
                        <?php $status = $v->status; ?>
                        <td>
                            @if($status != null)
                            <span class="label label-success">Paid</span>
                            @else
                            <span class="label label-danger">Due</span>
                            @endif
                        </td>
                        <td> <a href="{{url('student-receive-payments/'.$v->id)}}" class="btn btn-info">Receive Payments</a> </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>


<!--Add Invoice Modal Start-->
<div class="modal fade" id="addNewInvoice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Invoice Modal</h4>
            </div>
            <div class="modal-body" >
                <seclect class="form-control" id="addInvoiceModalAccountItemsInfo">
                    <option selected disabled> Select Account Item </option>
                </seclect>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Invoice</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Add Invoice Modal End-->



<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
function account_item_from_ajax(link, des)
{
    $.ajax({
        url: link,
        type: "GET",
        success: function (result) {
            //console.log(result);
            $(des).html(result.response);
        }
    });
}
</script>

<script>
    $(function () {
        $("#view1").DataTable();
        $('#view2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true
        });
    });
</script>
@endpush            <!-- End additional Script-->
@endsection
