<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{


    protected $table='subjects';
    protected $guarded=[];
    public function result()
    {
        return $this->hasMany('App\Models\Result','subject_id','id');
    }
}
