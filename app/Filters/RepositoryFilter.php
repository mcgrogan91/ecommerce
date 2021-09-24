<?php


namespace App\Filters;


abstract class RepositoryFilter
{
    protected $filters = [];

    protected $sort = null;

    public function addSort($column, $direction)
    {
        $this->sort = [
            'column' => $column,
            'direction' => $direction
        ];
    }

    public function hasSort(): bool
    {
        return !is_null($this->sort);
    }

    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Get the filters to be applied
     *
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    public function getFilter($filter)
    {
        if (array_key_exists($filter, $this->filters)) {
            return $this->filters[$filter];
        }
        return null;
    }

    /**
     * Add a filter to be applied to a Repository query
     *
     * @param $filter The name of the filter
     * @param $value The value for that filter
     */
    public function addFilter($filter, $value)
    {
        $this->filters[$filter] = $value;
    }


}