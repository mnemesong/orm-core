<?php

namespace Mnemesong\OrmCoreUnit\command;

use Mnemesong\Fit\Fit;
use Mnemesong\Fit\withCondition\WithCondInterface;
use Mnemesong\FitTestHelpers\withCondition\WithCondTestTrait;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\command\DeleteCommand;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCoreStubs\storages\RecordsDeleteModelStub;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use Mnemesong\OrmCoreTestHelpers\LimitContainsTestTrait;
use PHPUnit\Framework\TestCase;

class DeleteCommandTest extends TestCase
{
    use WithCondTestTrait;
    use AbleToSortTestTrait;
    use LimitContainsTestTrait;

    /**
     * @return DeleteCommand
     */
    protected function getDeleteCommand(): DeleteCommand
    {
        return new DeleteCommand(new RecordsDeleteModelStub());
    }

    /**
     * @return AbleToSortInterface
     */
    protected function getInitializedAbleToSort(): AbleToSortInterface
    {
        return $this->getDeleteCommand();
    }

    /**
     * @return TestCase
     */
    protected function useTestCase(): TestCase
    {
        return $this;
    }

    /**
     * @return LimitContainsInterface
     */
    protected function getInitializedLimitContains(): LimitContainsInterface
    {
        return $this->getDeleteCommand();
    }

    /**
     * @return WithCondInterface
     */
    protected function getInitWithCond(): WithCondInterface
    {
        return $this->getDeleteCommand();
    }

    /**
     * @return void
     */
    public function testRun1(): void
    {
        RecordsDeleteModelStub::clear();
        $this->getDeleteCommand()->exec();
        $this->assertEquals(null, RecordsDeleteModelStub::$lastUsedCond);
        $this->assertEquals([], RecordsDeleteModelStub::$lastUsedSortFields);
        $this->assertEquals(0, RecordsDeleteModelStub::$lastUsedLimit);
        $this->assertEquals('deleteRecords', RecordsDeleteModelStub::$lastUsedMethod);
    }

    /**
     * @return void
     */
    public function testRun2(): void
    {
        RecordsDeleteModelStub::clear();
        $this->getDeleteCommand()
            ->withLimit(3)
            ->where(Fit::field('age')->val('=', 25))
            ->sortedBy(['name', 'date'])
            ->exec();
        $this->assertEquals(Fit::field('age')->val('=', 25), RecordsDeleteModelStub::$lastUsedCond);
        $this->assertEquals(['name', 'date'], RecordsDeleteModelStub::$lastUsedSortFields);
        $this->assertEquals(3, RecordsDeleteModelStub::$lastUsedLimit);
        $this->assertEquals('deleteRecords', RecordsDeleteModelStub::$lastUsedMethod);
    }
}