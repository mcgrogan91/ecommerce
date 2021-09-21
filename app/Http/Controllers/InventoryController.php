<?php

namespace App\Http\Controllers;

use App\Repositories\InventoryRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InventoryRepository $repository)
    {
        $query = $repository->getInventoryForUser(
            Auth::user(),
            request()->get('query', null)
        );

        return view('inventory', [
            'inventory' => $query->paginate(20)
        ]);
    }
}
