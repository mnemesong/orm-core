<?php

namespace Mnemesong\OrmCoreTestHelpers;

use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use PHPUnit\Framework\TestCase;

trait LimitContainsTestTrait
{
    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    /**
     * @return LimitContainsInterface
     */
    abstract protected function initLimitContains(): LimitContainsInterface;

    /**
     * @return void
     */
    public function testLimits(): void
    {
        $obj1 = $this->initLimitContains();
        $this->useTestCase()->assertEquals($obj1->getLimit(), 0);

        $obj2 = $obj1->withLimit(4);
        $this->useTestCase()->assertEquals($obj2->getLimit(), 4);
        $this->useTestCase()->assertEquals($obj1->getLimit(), 0);

        $obj3 = $obj2->withoutLimit();
        $this->useTestCase()->assertEquals($obj2->getLimit(), 4);
        $this->useTestCase()->assertEquals($obj3->getLimit(), 0);
    }

    /**
     * @return void
     */
    public function testLimitsException1(): void
    {
        $obj1 = $this->initLimitContains();
        $this->expectException(\InvalidArgumentException::class);
        $obj2 = $obj1->withLimit(-1);
    }

}