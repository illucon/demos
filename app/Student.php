<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    
    use SoftDeletes;
    protected $table = 'students';
    protected $dates = ['deleted_at'];
    protected $fillable = ['sid', 'first_name', 'last_name', 'gender', 'group', 'religion', 'class_names_id', 'section', 'academic_year', 'image' ];
    
    
    public function studentDetailed()
    {
        return $this->hasOne('App\StudentDetailed');
//        return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
    }
    
    public function ClassName() {
        return $this->belongsTo('App\ClassName', 'class_names_id');
    }
    public function SectionName() {
        return $this->belongsTo('App\SectionName', 'section');
    }
    public function MarkEntry()
    {
        return $this->hasMany('App\MarkEntry', 'students_id');
//        return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
    }
    public function Invoice()
    {
        return $this->hasMany('App\Invoice', 'invoices_id');
    }
}
