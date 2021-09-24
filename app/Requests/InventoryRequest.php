<?php


namespace App\Requests;


use App\Filters\InventoryFilter;
use Illuminate\Http\Request;

class InventoryRequest
{
    /** @var Request */
    protected $request;

    function __construct($request)
    {
        $this->request = $request;
    }

    public function getFilters()
    {
        $filters = new InventoryFilter();
        if ($query = $this->request->get('query')) {
            $filters->addFilter('query', $query);
        }

        if (
            ($column = $this->request->get('sort_column')) &&
            ($direction = $this->request->get('sort_direction', 'desc'))
        ) {
            $filters->addSort($column, $direction);
        }

        return $filters;
    }

    // query, sort_column, sort_direction
}