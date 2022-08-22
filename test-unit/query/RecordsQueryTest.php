<?php

namespace Mnemesong\OrmCoreUnit\query;

use Mnemesong\Fit\Fit;
use Mnemesong\Fit\withCondition\WithCondInterface;
use Mnemesong\FitTestHelpers\withCondition\WithCondTestTrait;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmCoreStubs\storages\RecordsSearchModelStub;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use Mnemesong\OrmCoreTestHelpers\LimitContainsTestTrait;
use Mnemesong\Structure\collections\StructureCollection;
use PHPUnit\Framework\TestCase;

class RecordsQueryTest extends TestCase
{
    use WithCondTestTrait;
    use AbleToSortTestTrait;
    use LimitContainsTestTrait;

    /**
     * @return AbleToSortInterface
     */
    public function getInitializedAbleToSort(): AbleToSortInterface
    {
        return $this->getInitializedQuery();
    }

    /**
     * @return TestCase
     */
    public function useTestCase(): TestCase
    {
        return $this;
    }

    /**
     * @return WithCondInterface
     */
    protected function getInitWithCond(): WithCondInterface
    {
        return $this->getInitializedQuery();
    }

    /**
     * @return RecordsQuery
     */
    protected function getInitializedQuery(): RecordsQuery
    {
        return new RecordsQuery(new RecordsSearchModelStub());
    }

    /**
     * @return LimitContainsInterface
     */
    protected function getInitializedLimitContains(): LimitContainsInterface
    {
        return $this->getInitializedQuery();
    }

    /**
     * @return void
     */
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

    /**
     * @return void
     */
    public function testFindAll(): void
    {
        RecordsSearchModelStub::clear();
        $q = self::getInitializedQuery()
            ->withOnlyFields(['name', 'age'])
            ->sortedBy(['name', 'responsible'])
            ->where(Fit::field('age')->val('>=', 18)->asNum());
        $res = $q->find();
        $this->assertEquals(new StructureCollection([]), $res);
        $this->assertEquals('findAllRecords', RecordsSearchModelStub::$lastMethodUsed);
        $this->assertEquals(['name', 'age'], RecordsSearchModelStub::$lastSelectFields);
        $this->assertEquals(['name', 'responsible'], RecordsSearchModelStub::$lastSortFields);
        $this->assertEquals(Fit::field('age')->val('>=', 18)->asNum(), RecordsSearchModelStub::$lastCondUsed);
        $this->assertEquals(0, RecordsSearchModelStub::$lastUsedLimit);
    }

    /**
     * @return void
     */
    public function testFindFirstOrNull(): void
    {
        RecordsSearchModelStub::clear();
        $q = self::getInitializedQuery()
            ->withOnlyFields(['value', 'date'])
            ->sortedBy(['subName', 'link'])
            ->where(Fit::field('date')->arr('in', ['2022-01-02']))
            ->withLimit(1);
        $res = $q->find();
        $this->assertEquals(new StructureCollection([]), $res);
        $this->assertEquals('findAllRecords', RecordsSearchModelStub::$lastMethodUsed);
        $this->assertEquals(['value', 'date'], RecordsSearchModelStub::$lastSelectFields);
        $this->assertEquals(['subName', 'link'], RecordsSearchModelStub::$lastSortFields);
        $this->assertEquals(Fit::field('date')->arr('in', ['2022-01-02']), RecordsSearchModelStub::$lastCondUsed);
        $this->assertEquals(1, RecordsSearchModelStub::$lastUsedLimit);
    }
}