<?php


namespace App\Repositories;

use App\Inventory;
use App\User;

class InventoryRepository
{
    public function getInventoryForUser(User $user)
    {
        return Inventory::with('product')
            ->whereHas('product', function($query) use ($user) {
                $query->where('products.admin_id', '=', $user->id);
            });
    }
}