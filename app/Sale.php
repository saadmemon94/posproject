<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function products()
    {
         return $this->hasMany('Product', 'sale_products', 'sale_id', 'product_id');
        //  ->withPivot('sale_name', 'sale_info');
        //  ->withTimestamps();
    }
}
