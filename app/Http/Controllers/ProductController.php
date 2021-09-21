<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductRepository $repository)
    {
        $user = Auth::user();
        return view('products', [
            'products' => $repository->getProductsForUser($user)
        ]);
    }
}
