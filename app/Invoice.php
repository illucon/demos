<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    
    protected $table = 'invoices';
    protected $dates = ['deleted_at'];

    protected $fillable = ['paid_amount','due_amount','status','note','created_by'];
    
    public function Student() {
        return $this->belongsTo('App\Student', 'students_id');
    }
    
    public function AccountItem() {
        return $this->belongsTo('App\AccountItem', 'account_items_id');
    }
    
    
}
