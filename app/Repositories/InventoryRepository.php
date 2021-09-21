<?php


namespace App\Repositories;

use App\Inventory;
use App\User;

class InventoryRepository
{
    public function getInventoryForUser(User $user, $search = null)
    {
        $query =  Inventory::with('product')
            ->whereHas('product', function($query) use ($user) {
                $query->where('products.admin_id', '=', $user->id);
            });

        if ($search && !empty($search)) {
            if (is_integer($search)) {
                $query->where('product_id', '=', $search);
            } else {
                $query->where('sku', '=', $search);
            }
        }


        return $query;

    }
}