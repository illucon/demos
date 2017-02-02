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
    @foreach($invoices_info as $v)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <?php $date = strtotime($v->created_at);
            echo date('d-F-Y', $date); ?>
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