<?php


namespace App\Repositories;

use App\Product;
use App\User;

class ProductRepository
{

    function __construct()
    {

    }

    public function getProducts()
    {
        return Product::all();
    }

    public function getProductsForUser(User $user)
    {
        return $user->products;
    }
}