<?php


namespace App\Repositories;

use App\Filters\InventoryFilter;
use App\Inventory;
use App\User;

class InventoryRepository
{
    public function getInventoryForUser(User $user, InventoryFilter $filter)
    {
//        $query =  Inventory::with('product')
//            ->whereHas('product', function($query) use ($user) {
//                $query->where('products.admin_id', '=', $user->id);
//            });

        $query = $user->inventory()->with('product');


        if (($search = $filter->getFilter('query')) && !empty($search)) {
            if (is_numeric($search)) {
                $query->where('product_id', '=', $search);
            } else {
                $query->where(function($query) use ($search) {
                    $query->where('sku', '=', $search)
                        ->orWhere('products.product_name', 'like', "%$search%");
                });
            }
        }

        if ($filter->hasSort()) {
            $sort = $filter->getSort();
            $query->orderBy($sort['column'], $sort['direction']);
        }

        return $query;

    }
}