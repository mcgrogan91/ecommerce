<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the product associated with the order.
     */
    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
