<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountHead extends Model
{
    use SoftDeletes;
    
    protected $table = 'account_heads';
    protected $dates = ['deleted_at'];

    protected $fillable = ['head_name','head_category','created_by'];
    
    public function AccountType() {
        return $this->belongsTo('App\AccountType', 'account_types_id');
    }
    public function AccountItem() {
        return $this->hasMany('App\AccountItem', 'account_items_id');
    }
}
