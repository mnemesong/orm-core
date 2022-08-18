<?php

namespace Mnemesong\OrmCoreUnit\testHelpers;

use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCoreStubs\testHelpers\AbleToSortStub;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use PHPUnit\Framework\TestCase;

class AbleToSortTest extends TestCase
{
    use AbleToSortTestTrait;

    protected function getInitializedAbleToSort(): AbleToSortInterface
    {
        return new AbleToSortStub();
    }

    protected function useTestCase(): TestCase
    {
        return $this;
    }
}