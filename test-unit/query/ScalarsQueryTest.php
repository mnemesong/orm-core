<?php

namespace Mnemesong\OrmCoreUnit\query;

use Mnemesong\OrmCore\query\ScalarsQuery;
use Mnemesong\OrmCoreStubs\storages\ScalarsSearchModelStub;
use Mnemesong\Scalarex\Scalar;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Spex\Sp;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\SpexUnitTest\specified\traits\SpecifiedTestTrait;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class ScalarsQueryTest extends TestCase
{
    use SpecifiedTestTrait;

    protected function getInitializedSpecified(): SpecifiedInterface
    {
        return new ScalarsQuery(new ScalarsSearchModelStub());
    }

    protected function useTestCase(): TestCase
    {
        return $this;
    }

    protected function getQuery(): ScalarsQuery
    {
        return new ScalarsQuery(new ScalarsSearchModelStub());
    }

    public function testScalars(): void
    {
        $q1 = $this->getQuery();
        $this->assertEquals([], $q1->getScalars());

        $q2 = $q1->withScalar(Scalar::max('age'));
        $this->assertEquals([Scalar::max('age')], $q2->getScalars());
        $this->assertEquals([], $q1->getScalars());

        $q3 = $q2->withScalar(Scalar::count('name'));
        $this->assertEquals([Scalar::max('age'), Scalar::count('name')], $q3->getScalars());
        $this->assertEquals([Scalar::max('age')], $q2->getScalars());

        $q4 = $q3->withScalarsFilteredBy(fn(ScalarSpecification $scalar) => ($scalar->getType() === 'count'));
        $this->assertEquals([Scalar::max('age'), Scalar::count('name')], $q3->getScalars());
        $this->assertEquals([Scalar::count('name')], $q4->getScalars());
    }

    public function testFind(): void
    {
        $q1 = $this->getQuery()
            ->withScalar(Scalar::avg('date'))
            ->where(Sp::ex('s=', 'date', '2022-01-03'));
        ScalarsSearchModelStub::clear();
        $res = $q1->find();
        $this->assertEquals(new Structure([]), $res);
        $this->assertEquals('findScalars', ScalarsSearchModelStub::$lastMethodUsed);
        $this->assertEquals([Scalar::avg('date')], ScalarsSearchModelStub::$lastScalars);
        $this->assertEquals(Sp::ex('s=', 'date', '2022-01-03'), ScalarsSearchModelStub::$lastSpecificationUsed);
    }
}