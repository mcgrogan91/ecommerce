<?php


namespace App\Repositories;

use App\Product;

class ProductRepository
{

    function __construct()
    {

    }

    public function getProducts()
    {
        return Product::all();
    }
}