<?php

namespace Mnemesong\OrmCoreTestHelpers;

use Mnemesong\OrmCore\limitExecutable\LimitExecutableInterface;
use PHPUnit\Framework\TestCase;

trait LimitExecutableTestTrait
{
    /**
     * @return TestCase
     */
    abstract public function useTestCase(): TestCase;

    /**
     * @return LimitExecutableInterface
     */
    abstract public function initLimitExecutable(): LimitExecutableInterface;

    /**
     * @return void
     */
    public function testLimits(): void
    {
        $obj1 = $this->initLimitExecutable();
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
        $obj1 = $this->initLimitExecutable();
        $this->expectException(\InvalidArgumentException::class);
        $obj2 = $obj1->withLimit(-1);
    }

}