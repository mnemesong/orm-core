<?php

namespace Mnemesong\OrmCoreUnit\command;

use Mnemesong\Fit\Fit;
use Mnemesong\Fit\withCondition\WithCondInterface;
use Mnemesong\FitTestHelpers\withCondition\WithCondTestTrait;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\command\UpdateCommand;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCoreStubs\storages\RecordsUpdateModelStub;
use Mnemesong\OrmCoreTestHelpers\AbleToRecordingTestTrait;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use Mnemesong\OrmCoreTestHelpers\LimitContainsTestTrait;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class UpdateCommandTest extends TestCase
{
    use WithCondTestTrait;
    use AbleToRecordingTestTrait;
    use AbleToSortTestTrait;
    use LimitContainsTestTrait;

    /**
     * @param Structure $structure
     * @return UpdateCommand
     */
    protected function getUpdateCommand(Structure $structure): UpdateCommand
    {
        return new UpdateCommand(new RecordsUpdateModelStub(), $structure);
    }

    /**
     * @return Structure
     */
    protected function getTestStructure(): Structure
    {
        return new Structure(['name' => 'Sam', 'age' => 20]);
    }

    /**
     * @return TestCase
     */
    protected function useTestCase(): TestCase
    {
        return $this;
    }

    /**
     * @param Structure $struct
     * @return AbleToRecordingInterface
     */
    protected function getAbleToRecordingWithStructure(Structure $struct): AbleToRecordingInterface
    {
        return $this->getUpdateCommand($struct);
    }

    /**
     * @return AbleToSortInterface
     */
    protected function getInitializedAbleToSort(): AbleToSortInterface
    {
        return $this->getUpdateCommand($this->getTestStructure());
    }

    /**
     * @return LimitContainsInterface
     */
    protected function getInitializedLimitContains(): LimitContainsInterface
    {
        return $this->getUpdateCommand($this->getTestStructure());
    }

    /**
     * @return WithCondInterface
     */
    protected function getInitWithCond(): WithCondInterface
    {
        return $this->getUpdateCommand($this->getTestStructure());
    }

    /**
     * @return void
     */
    public function testRun1(): void
    {
        RecordsUpdateModelStub::clear();
        $this->getUpdateCommand($this->getTestStructure())->exec();
        $this->assertEquals($this->getTestStructure(), RecordsUpdateModelStub::$lastUsedStructure);
        $this->assertEquals(null, RecordsUpdateModelStub::$lastUsedCond);
        $this->assertEquals(0, RecordsUpdateModelStub::$lastUsedLimit);
        $this->assertEquals([], RecordsUpdateModelStub::$lastUsedSortFields);
        $this->assertEquals('updateRecords', RecordsUpdateModelStub::$lastUsedMethod);
    }

    /**
     * @return void
     */
    public function testRun2(): void
    {
        RecordsUpdateModelStub::clear();
        $this->getUpdateCommand($this->getTestStructure())
            ->where(Fit::field('date')->val('>', '2021-10-11'))
            ->withLimit(5)
            ->sortedBy(['name' => 'asc', 'date' => 'desc'])
            ->exec();
        $this->assertEquals($this->getTestStructure(), RecordsUpdateModelStub::$lastUsedStructure);
        $this->assertEquals(Fit::field('date')->val('>', '2021-10-11'), RecordsUpdateModelStub::$lastUsedCond);
        $this->assertEquals(5, RecordsUpdateModelStub::$lastUsedLimit);
        $this->assertEquals(['name' => 'asc', 'date' => 'desc'], RecordsUpdateModelStub::$lastUsedSortFields);
        $this->assertEquals('updateRecords', RecordsUpdateModelStub::$lastUsedMethod);
    }
}