<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingDistrict extends Model
{
    public $table="shipping_districts";
    public $fillable=['district_name','status'];
    public function cities(){
        return $this->hasMany('App\ShippingCity','district_id','id');
    }
    
}