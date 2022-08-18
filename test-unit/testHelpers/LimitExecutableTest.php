<?php

namespace Mnemesong\OrmCoreUnit\testHelpers;

use Mnemesong\OrmCore\limitExecutable\LimitExecutableInterface;
use Mnemesong\OrmCoreStubs\testHelpers\LimitExecutableStub;
use Mnemesong\OrmCoreTestHelpers\LimitExecutableTestTrait;
use PHPUnit\Framework\TestCase;

class LimitExecutableTest extends TestCase
{
    use LimitExecutableTestTrait;

    public function useTestCase(): TestCase
    {
        return $this;
    }

    public function initLimitExecutable(): LimitExecutableInterface
    {
        return new LimitExecutableStub();
    }
}