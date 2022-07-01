<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    protected $guarded=[];

   public function users()
   {
    return $this->belongsTo('App\Models\User','id');
   }
   public function Subject()
   {
    return $this->belongsTo('App\Models\Subject','subject_id');
   }
}
