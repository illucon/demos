<option selected disabled>Select Account Items</option>
@foreach($info_2 as $v)
<option value="{{$v->id}}">{{$v->account_item_name}}</option>
@endforeach
