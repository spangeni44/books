<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingCity extends Model
{
    public $table="shipping_cities";
    public $fillable=['city_name','shipping_charge','district_id','status'];
    public function district(){
        return $this->hasOne('App\ShippingDistrict','id','district_id');
    }
}