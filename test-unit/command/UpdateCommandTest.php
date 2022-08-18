<?php

namespace Mnemesong\OrmCoreUnit\command;

use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\command\UpdateCommand;
use Mnemesong\OrmCore\limitExecutable\LimitExecutableInterface;
use Mnemesong\OrmCoreStubs\storages\RecordsUpdateModelStub;
use Mnemesong\OrmCoreTestHelpers\AbleToRecordingTestTrait;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use Mnemesong\OrmCoreTestHelpers\LimitExecutableTestTrait;
use Mnemesong\Spex\Sp;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\SpexUnitTest\specified\traits\SpecifiedTestTrait;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class UpdateCommandTest extends TestCase
{
    use SpecifiedTestTrait;
    use AbleToRecordingTestTrait;
    use AbleToSortTestTrait;
    use LimitExecutableTestTrait;

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
     * @return LimitExecutableInterface
     */
    protected function initLimitExecutable(): LimitExecutableInterface
    {
        return $this->getUpdateCommand($this->getTestStructure());
    }

    /**
     * @return SpecifiedInterface
     */
    protected function getInitializedSpecified(): SpecifiedInterface
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
        $this->assertEquals(null, RecordsUpdateModelStub::$lastUsedSpecification);
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
            ->where(Sp::ex('s>', 'date', '2021-10-11'))
            ->withLimit(5)
            ->sortedBy(['name', 'date'])
            ->exec();
        $this->assertEquals($this->getTestStructure(), RecordsUpdateModelStub::$lastUsedStructure);
        $this->assertEquals(Sp::ex('s>', 'date', '2021-10-11'), RecordsUpdateModelStub::$lastUsedSpecification);
        $this->assertEquals(5, RecordsUpdateModelStub::$lastUsedLimit);
        $this->assertEquals(['name', 'date'], RecordsUpdateModelStub::$lastUsedSortFields);
        $this->assertEquals('updateRecords', RecordsUpdateModelStub::$lastUsedMethod);
    }
}