<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
    public function author(){
        return $this->hasOne('\App\User','id','added_by');
    }
}


