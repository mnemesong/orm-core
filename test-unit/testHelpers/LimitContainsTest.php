<?php

namespace Mnemesong\OrmCoreUnit\testHelpers;

use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCoreStubs\testHelpers\LimitContainsStub;
use Mnemesong\OrmCoreTestHelpers\LimitContainsTestTrait;
use PHPUnit\Framework\TestCase;

class LimitContainsTest extends TestCase
{
    use LimitContainsTestTrait;

    protected function useTestCase(): TestCase
    {
        return $this;
    }

    protected function initLimitContains(): LimitContainsInterface
    {
        return new LimitContainsStub();
    }
}