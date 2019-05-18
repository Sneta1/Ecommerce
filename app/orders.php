<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $fillable = [
        'product_name', 'product_description', 'product_price', 'product_image','customer_id'];
    

    public function user(){
       return $this->belongsTo(User::class);
    }
 }
