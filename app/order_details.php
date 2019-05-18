<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    protected $fillable = [
        'product_id', 'product_name'
    ];
}
