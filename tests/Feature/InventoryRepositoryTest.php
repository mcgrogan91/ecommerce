<?php

namespace Tests\Feature;

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
                'count' => 450
            ],
            "id search" => [
                'user_id' => 24,
                'search' => 138,
                'count' => 2
            ],
            "sku search" => [
                'user_id' => 24,
                'search' => "INXAWD",
                'count' => 1
            ],
            "bad search" => [
                'user_id' => 24,
                'search' => "INVALID",
                'count' => 0
            ]
        ];
    }
    /**
     * @dataProvider getInventorySearches
     */
    public function testGetInventoryForUser($userId, $search, $expected)
    {
        $user = User::find($userId);

        /** @var Builder $result */
        $result = $this->repository->getInventoryForUser($user, $search);

        $this->assertEquals($expected, $result->count());
    }
}
