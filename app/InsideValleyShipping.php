<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsideValleyShipping extends Model
{
    public $table="inside_valley_shippings";
    public $fillable=['inside_ringroad_price','outside_ringroad_price','lalitpur_shipping_price','bhaktapur_shipping_price'];
    
}