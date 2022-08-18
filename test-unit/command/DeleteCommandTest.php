<?php

namespace Mnemesong\OrmCoreUnit\command;

use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\command\DeleteCommand;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCoreStubs\storages\RecordsDeleteModelStub;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use Mnemesong\OrmCoreTestHelpers\LimitContainsTestTrait;
use Mnemesong\Spex\Sp;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\SpexUnitTest\specified\traits\SpecifiedTestTrait;
use PHPUnit\Framework\TestCase;

class DeleteCommandTest extends TestCase
{
    use SpecifiedTestTrait;
    use AbleToSortTestTrait;
    use LimitContainsTestTrait;

    protected function getDeleteCommand(): DeleteCommand
    {
        return new DeleteCommand(new RecordsDeleteModelStub());
    }

    protected function getInitializedAbleToSort(): AbleToSortInterface
    {
        return $this->getDeleteCommand();
    }

    protected function useTestCase(): TestCase
    {
        return $this;
    }

    protected function getInitializedLimitContains(): LimitContainsInterface
    {
        return $this->getDeleteCommand();
    }

    protected function getInitializedSpecified(): SpecifiedInterface
    {
        return $this->getDeleteCommand();
    }

    public function testRun1(): void
    {
        RecordsDeleteModelStub::clear();
        $this->getDeleteCommand()->exec();
        $this->assertEquals(null, RecordsDeleteModelStub::$lastUsedSpecification);
        $this->assertEquals([], RecordsDeleteModelStub::$lastUsedSortFields);
        $this->assertEquals(0, RecordsDeleteModelStub::$lastUsedLimit);
        $this->assertEquals('deleteRecords', RecordsDeleteModelStub::$lastUsedMethod);
    }

    public function testRun2(): void
    {
        RecordsDeleteModelStub::clear();
        $this->getDeleteCommand()
            ->withLimit(3)
            ->where(Sp::ex('n=', 'age', 25))
            ->sortedBy(['name', 'date'])
            ->exec();
        $this->assertEquals(Sp::ex('n=', 'age', 25), RecordsDeleteModelStub::$lastUsedSpecification);
        $this->assertEquals(['name', 'date'], RecordsDeleteModelStub::$lastUsedSortFields);
        $this->assertEquals(3, RecordsDeleteModelStub::$lastUsedLimit);
        $this->assertEquals('deleteRecords', RecordsDeleteModelStub::$lastUsedMethod);
    }
}