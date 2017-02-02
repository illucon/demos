<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReceivePayment extends Model
{
    use SoftDeletes;

    protected $table = 'receive_payments';
    protected $dates = ['deleted_at'];
    protected $fillable =['paid_amount','received_by','note'];
}
