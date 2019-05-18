<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function wishlist()
   	{
     return $this->hasMany(wishlist::class);
 	}
 	public function products()
   	{
     return $this->hasMany('order_details', 'product_id');
 	}
}
