<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountType extends Model
{
    use SoftDeletes;
    
    protected $table = 'account_types';
    protected $dates = ['deleted_at'];

    protected $fillable = ['account_type_name','created_by'];
    
    public function AccountHead(){
        return $this->hasMany('App\AccountHead', 'account_heads_id');
    }
    
}
