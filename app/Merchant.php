<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    /**
     * Get the products for the blog post.
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
