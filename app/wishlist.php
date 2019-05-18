<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
   protected $table='tbl_wishlist';

   
   protected $fillable = ['customer_id','pro_id'];

   public function user(){
       return $this->belongsTo(User::class);
    }

    /*public function product(){
       return $this->belongsTo(Product::class);
    }*/
}
