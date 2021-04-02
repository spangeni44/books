<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','book_language','author_name','added_by', 'user_id', 'category_id', 'subcategory_id', 'subsubcategory_id', 'publication_id', 'video_provider', 'video_link', 'unit_price',
        'purchase_price', 'unit','book_version','book_reader','duration','trial_time','trial_pages','publish_date','price_per_day','price_per_week','price_per_month', 'slug','no_of_pages', 'colors', 'choice_options', 'variations', 'current_stock','sku','warrenty','excerpt'
      ];
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function subcategory(){
    	return $this->belongsTo(SubCategory::class);
    }

    public function subsubcategory(){
    	return $this->belongsTo(SubSubCategory::class);
    }

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }
    public function publication(){
        return $this->belongsTo(Publication::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function orderDetails(){
    return $this->hasMany(OrderDetail::class);
    }

    public function reviews(){
    return $this->hasMany(Review::class)->where('status', 1);
    }

    public function wishlists(){
    return $this->hasMany(Wishlist::class);
    }

    public function stocks(){
    return $this->hasMany(ProductStock::class);
    }
}
