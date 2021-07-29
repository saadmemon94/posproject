<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function sale()
    {
         return $this->belongsTo('Sale', 'sale_products', 'product_id', 'sale_id');
        //  ->withTimestamps();
    }
}
