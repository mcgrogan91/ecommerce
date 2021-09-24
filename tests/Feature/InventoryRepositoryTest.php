<?php

namespace Tests\Feature;

use App\Filters\InventoryFilter;
use App\User;
use Illuminate\Database\Query\Builder;
use Tests\TestCase;
use App\Repositories\InventoryRepository as Repository;

class InventoryRepositoryTest extends TestCase
{
    /** @var Repository */
    protected $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = app()->make(Repository::class);
    }

    public function getInventorySearches()
    {
        return [
            "No search" => [
                'user_id' => 24,
                'search' => null,
                'sort' => null,
                'count' => 450,
                'expectedFirstItem' => null
            ],
            "id search" => [
                'user_id' => 24,
                'search' => "138",
                'sort' => null,
                'count' => 2,
                'expectedFirstItem' => null
            ],
            "sku search" => [
                'user_id' => 24,
                'search' => "INXAWD",
                'sort' => null,
                'count' => 1,
                'expectedFirstItem' => null
            ],
            "sku search" => [
                'user_id' => 24,
                'search' => "Slippers",
                'sort' => null,
                'count' => 10,
                'expectedFirstItem' => null
            ],
            "sku ordered search" => [
                'user_id' => 24,
                'search' => "Slippers",
                'sort' => [
                    'column' => 'quantity',
                    'direction' => 'asc'
                ],
                'count' => 10,
                'expectedFirstItem' => 7046
            ],
//            "bad sku ordered search" => [
//                'user_id' => 24,
//                'search' => "Slippers",
//                'sort' => [
//                    'column' => '-- SELECT * from users;',
//                    'direction' => 'asc'
//                ],
//                'count' => 10,
//                'expectedFirstItem' => 10827
//            ],
            "bad search" => [
                'user_id' => 24,
                'search' => "INVALID",
                'sort' => null,
                'count' => 0,
                'expectedFirstItem' => null
            ]
        ];
    }
    /**
     * @dataProvider getInventorySearches
     */
    public function testGetInventoryForUser($userId, $search, $sort, $expected, $firstId)
    {
        $user = User::find($userId);

        $filter = new InventoryFilter();
        $filter->addFilter('query', $search);
        if ($sort) {
            $filter->addSort($sort['column'], $sort['direction']);
        }

        /** @var Builder $result */
        $result = $this->repository->getInventoryForUser($user, $filter);


        $this->assertEquals($expected, $result->count());

        if ($firstId) {
            $this->assertEquals($firstId, $result->first()->id);
        }
    }

}
