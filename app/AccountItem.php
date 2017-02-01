<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountItem extends Model
{
    use SoftDeletes;
    
    protected $table = 'account_items';
    protected $dates = ['deleted_at'];

    protected $fillable = ['account_item_name','account_item_price','created_by'];
    
    public function AccountHead() {
        return $this->belongsTo('App\AccountHead', 'account_heads_id');
    }
}
