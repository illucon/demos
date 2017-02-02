@extends('admin.master')

@section('title', 'Student Receive Payments')


@section('main-content')    


@push('css')     <!-- additional css-->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.css">
@endpush         <!-- end additional css-->


<!--Start main Content-->

<div class="row">
    <div class="well">
        <h2 class="text-center text-primary text-capitalize">
            Student Receive Payments:
            <?php echo $student_info->first_name.' '.$student_info->last_name.' (Class:  '.$student_info->ClassName->class_name.') '; ?>
        </h2>
    </div>    
</div>

<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        <div class="box box-info">
            <div class="box-header">
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{ url('save-student-payments') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="paidAmount" class="col-sm-3 control-label">Paid Amount</label>
                            <div class="col-sm-9">
                                <input name="paid_amount" type="number" placeholder="Enter Paid Amount"  class="form-control" id="paidAmount">
                            </div>
                        </div>
                        <input type="hidden" name="invoice_item_id" value="{{ $invoice_info->id }}">
                        <input type="hidden" name="item_received_by" value="user_from_session">
                        <div class="form-group">
                            <label for="accountItemStatus" class="col-sm-3 control-label">Invoice Item Status</label>
                            <div class="col-sm-9">
                                <select name="invoice_item_status" class="form-control" id="accountItemStatus">
                                    <option value="1" selected>Paid</option>
                                    <option value="0">Unpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountItemName" class="col-sm-3 control-label">Account Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $invoice_info->AccountItem->account_item_name }}" class="form-control" id="accountItemName" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountItemPrice" class="col-sm-3 control-label">Receivable Amount</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ $invoice_info->receivable_amount }}" class="form-control" id="accountItemPrice" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="accountItemDue" class="col-sm-3 control-label">Account Item Due</label>
                            <div class="col-sm-9">
                                <input type="number" value="" class="form-control" id="accountItemDue" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="accountItemNote" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-9">
                                <textarea name="note" class="form-control" id="accountItemNote" placeholder="remind some note"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>              
</div>



<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->

<!--Due Amount Calculation-->
<script>
    
    $(document).ready(function(){
        $("#paidAmount").keyup(function(){
            
            var paidAmount = $('#paidAmount').val();
            var accountItemPrice = $('#accountItemPrice').val();            
            var due = (accountItemPrice - paidAmount);            
            $('#accountItemDue').val(due);
        });
    });
    
    
//    var bla = $('#txt_name').val();
//
////Set
//$('#txt_name').val('bla');

</script>
@endpush            <!-- End additional Script-->
@endsection
