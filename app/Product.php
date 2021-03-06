<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the merchant that owns the product.
     */
    public function merchant()
    {
        return $this->belongsTo('App\Merchant');
    }
}
