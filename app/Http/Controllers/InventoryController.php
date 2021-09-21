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
        $user = Auth::user();

        /** @var Builder $a */
        $query = $repository->getInventoryForUser($user);
        //dd($query->paginate(10));
        return view('inventory', [
            'inventory' => $query->paginate(20)
        ]);
    }
}
