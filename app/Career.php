<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
   
    public $table="careers";
    
    public function appliedJobs(){
        return $this->hasMany('App\AppliedJob','career_id','id');
    }
}
