<?php

namespace Mnemesong\OrmCoreUnit\query;

use Mnemesong\Fit\Fit;
use Mnemesong\Fit\withCondition\WithCondInterface;
use Mnemesong\FitTestHelpers\withCondition\WithCondTestTrait;
use Mnemesong\OrmCore\query\ScalarsQuery;
use Mnemesong\OrmCoreStubs\storages\ScalarsSearchModelStub;
use Mnemesong\Scalarex\Scalar;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class ScalarsQueryTest extends TestCase
{
    use WithCondTestTrait;

    /**
     * @return WithCondInterface
     */
    protected function getInitWithCond(): WithCondInterface
    {
        return new ScalarsQuery(new ScalarsSearchModelStub());
    }

    /**
     * @return TestCase
     */
    protected function useTestCase(): TestCase
    {
        return $this;
    }

    /**
     * @return ScalarsQuery
     */
    protected function getQuery(): ScalarsQuery
    {
        return new ScalarsQuery(new ScalarsSearchModelStub());
    }

    /**
     * @return void
     */
    public function testScalars(): void
    {
        $q1 = $this->getQuery();
        $this->assertEquals([], $q1->getScalars());

        $q2 = $q1->withAddScalar(Scalar::max('age'));
        $this->assertEquals([Scalar::max('age')], $q2->getScalars());
        $this->assertEquals([], $q1->getScalars());

        $q3 = $q2->withAddScalar(Scalar::count('name'));
        $this->assertEquals([Scalar::max('age'), Scalar::count('name')], $q3->getScalars());
        $this->assertEquals([Scalar::max('age')], $q2->getScalars());

        $q4 = $q3->withScalarsFilteredBy(fn(ScalarSpecification $scalar) => ($scalar->getType() === 'count'));
        $this->assertEquals([Scalar::max('age'), Scalar::count('name')], $q3->getScalars());
        $this->assertEquals([Scalar::count('name')], $q4->getScalars());
    }

    /**
     * @return void
     */
    public function testFind(): void
    {
        $q1 = $this->getQuery()
            ->withAddScalar(Scalar::avg('date'))
            ->where(Fit::field('date')->val('=', '2022=01-03')->asStr());
        ScalarsSearchModelStub::clear();
        $res = $q1->find();
        $this->assertEquals(new Structure([]), $res);
        $this->assertEquals('findScalars', ScalarsSearchModelStub::$lastMethodUsed);
        $this->assertEquals([Scalar::avg('date')], ScalarsSearchModelStub::$lastScalars);
        $this->assertEquals(Fit::field('date')->val('=', '2022=01-03')->asStr(), ScalarsSearchModelStub::$lastCondUsed);
    }
}