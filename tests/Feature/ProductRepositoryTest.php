<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use \App\Repositories\ProductRepository as Repository;

/**
 * A test of ProductRepository
 *
 * Realistically this would stand up its own set of Products/etc and test
 *
 * Given time constraints, this is just going to test against the provided DB
 */
class ProductRepositoryTest extends TestCase
{
    /** @var Repository */
    protected $repository;

    public function setUp()
    {
        parent::setUp();
        $this->repository = app()->make(Repository::class);
    }

    public function testGetAll()
    {
        $this->assertCount(10789, $this->repository->getProducts());
    }

    public function getProductCounts()
    {
        return [
            "Test Case 1" => [24, 193],
            "Test Case 2" => [37, 210],
            "Test Case 3" => [59, 205]
        ];
    }
    /**
     * @dataProvider getProductCounts
     */
    public function testGetProductsForUser($user, $expected)
    {
        $user = User::find($user);
        $this->assertCount($expected, $this->repository->getProductsForUser($user));
    }
}
