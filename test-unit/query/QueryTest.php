<?php

namespace Mnemesong\OrmCoreUnit\query;

use Mnemesong\OrmCore\query\Query;
use Mnemesong\Spex\specifications\comparing\NumericValueComparingSpecification;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    public function testSelect()
    {
        $query = new Query();
        $this->assertEquals($query->getSelectFields(), []);

        $newQuery = $query->withSelect(['data', 'id']);
        $this->assertEquals($newQuery->getSelectFields(), ['data', 'id']);
        $this->assertEquals($query->getSelectFields(), []);
    }

    public function testSelectArrayOfStringsException()
    {
        $query = new Query();
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line */
        $newQuery = $query->withSelect([['id'], 'data']);
    }

    public function testSortBy()
    {
        $query = new Query();
        $this->assertEquals($query->getSortBy(), []);

        $newQuery = $query->sortedBy(['name' => 'asc', 'value' => 'desc']);
        $this->assertEquals($query->getSortBy(), []);
        $this->assertEquals($newQuery->getSortBy(), ['name' => 'asc', 'value' => 'desc']);
    }

    public function testSortByArrayOfStringsException()
    {
        $query = new Query();
        $this->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line */
        $query->sortedBy([['id'], 'data']);
    }

    public function testBasicSpecificationOperations()
    {
        $query = new Query();
        $this->assertEquals($query->getSpecification(), null);

        $newQuery = $query->where(new NumericValueComparingSpecification('n>=', 'uuid', 0, ));
        $this->assertEquals($query->getSpecification(), null);
        $this->assertEquals(
            $newQuery->getSpecification(),
            new NumericValueComparingSpecification('n>=', 'uuid', 0)
        );
    }

}