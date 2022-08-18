<?php

namespace Mnemesong\OrmCoreUnit\query;

use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmCoreStubs\storages\RecordsSearchModelStub;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use Mnemesong\OrmCoreTestHelpers\LimitContainsTestTrait;
use Mnemesong\Spex\Sp;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\SpexUnitTest\specified\traits\SpecifiedTestTrait;
use Mnemesong\Structure\collections\StructureCollection;
use PHPUnit\Framework\TestCase;

class RecordsQueryTest extends TestCase
{
    use SpecifiedTestTrait;
    use AbleToSortTestTrait;
    use LimitContainsTestTrait;

    public function getInitializedAbleToSort(): AbleToSortInterface
    {
        return $this->getInitializedQuery();
    }

    public function useTestCase(): TestCase
    {
        return $this;
    }

    protected function getInitializedSpecified(): SpecifiedInterface
    {
        return $this->getInitializedQuery();
    }

    protected function getInitializedQuery(): RecordsQuery
    {
        return new RecordsQuery(new RecordsSearchModelStub());
    }

    protected function getInitializedLimitContains(): LimitContainsInterface
    {
        return $this->getInitializedQuery();
    }

    public function testSelectFields(): void
    {
        $q1 = self::getInitializedQuery();
        $this->assertEquals([], $q1->getSelectFields());

        $q2 = $q1->withOnlyFields(['name', 'data']);
        $this->assertEquals(['name', 'data'], $q2->getSelectFields());
        $this->assertEquals([], $q1->getSelectFields());

        $q3 = $q2->withAllFields();
        $this->assertEquals(['name', 'data'], $q2->getSelectFields());
        $this->assertEquals([], $q3->getSelectFields());
    }

    public function testFindAll(): void
    {
        RecordsSearchModelStub::clear();
        $q = self::getInitializedQuery()
            ->withOnlyFields(['name', 'age'])
            ->sortedBy(['name', 'responsible'])
            ->where(Sp::ex('n>=', 'age', 18));
        $res = $q->find();
        $this->assertEquals(new StructureCollection([]), $res);
        $this->assertEquals('findAllRecords', RecordsSearchModelStub::$lastMethodUsed);
        $this->assertEquals(['name', 'age'], RecordsSearchModelStub::$lastSelectFields);
        $this->assertEquals(['name', 'responsible'], RecordsSearchModelStub::$lastSortFields);
        $this->assertEquals(Sp::ex('n>=', 'age', 18), RecordsSearchModelStub::$lastSpecificationUsed);
        $this->assertEquals(0, RecordsSearchModelStub::$lastUsedLimit);
    }

    public function testFindFirstOrNull(): void
    {
        RecordsSearchModelStub::clear();
        $q = self::getInitializedQuery()
            ->withOnlyFields(['value', 'date'])
            ->sortedBy(['subName', 'link'])
            ->where(Sp::ex('in', 'date', ['2022-01-02']))
            ->withLimit(1);
        $res = $q->find();
        $this->assertEquals(new StructureCollection([]), $res);
        $this->assertEquals('findAllRecords', RecordsSearchModelStub::$lastMethodUsed);
        $this->assertEquals(['value', 'date'], RecordsSearchModelStub::$lastSelectFields);
        $this->assertEquals(['subName', 'link'], RecordsSearchModelStub::$lastSortFields);
        $this->assertEquals(Sp::ex('in', 'date', ['2022-01-02']), RecordsSearchModelStub::$lastSpecificationUsed);
        $this->assertEquals(1, RecordsSearchModelStub::$lastUsedLimit);
    }
}