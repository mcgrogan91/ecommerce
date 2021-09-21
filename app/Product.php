<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The user that owns this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }

    /**
     * Inventory records for a product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventory()
    {
        return $this->hasMany('App\Inventory');
    }

    public function getSkus()
    {
        return $this->inventory->pluck('sku')->toArray();
    }
}
