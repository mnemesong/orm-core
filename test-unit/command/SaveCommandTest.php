<?php

namespace Mnemesong\OrmCoreUnit\command;

use _PHPStan_9a6ded56a\Symfony\Component\Console\Command\Command;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\command\SaveCommand;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCoreStubs\storages\RecordsSaveModelStub;
use Mnemesong\OrmCoreTestHelpers\AbleToRecordingTestTrait;
use Mnemesong\OrmCoreTestHelpers\AbleToSortTestTrait;
use Mnemesong\OrmCoreTestHelpers\LimitContainsTestTrait;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class SaveCommandTest extends TestCase
{
    use AbleToRecordingTestTrait;

    /**
     * @return Structure
     */
    protected function getSavedStructure(): Structure
    {
        return new Structure(['name' => 'Sam', 'comment' => 'Some comment', 'age' => 18]);
    }

    /**
     * @return SaveCommand
     */
    protected function getInitializedSaveCommand(): SaveCommand
    {
        return new SaveCommand(new RecordsSaveModelStub(), $this->getSavedStructure());
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
        return new SaveCommand(new RecordsSaveModelStub(), $struct);
    }

    /**
     * @return void
     */
    public function testBasics(): void
    {
        $com1 = $this->getInitializedSaveCommand();
        $this->assertEquals(new RecordsSaveModelStub(), $com1->getRecordSaveModel());
        $this->assertEquals($this->getSavedStructure(), $com1->getStructure());
        $this->assertEquals(false, $com1->isSmartUpdate());

        $com2 = $com1->withSmartUpdate();
        $this->assertEquals(false, $com1->isSmartUpdate());
        $this->assertEquals(true, $com2->isSmartUpdate());

        $com3 = $com2->withHardInsert();
        $this->assertEquals(false, $com3->isSmartUpdate());
        $this->assertEquals(true, $com2->isSmartUpdate());
    }

    /**
     * @return void
     */
    public function testRun1(): void
    {
        RecordsSaveModelStub::clear();
        $this->getInitializedSaveCommand()->exec();
        $this->assertEquals($this->getSavedStructure(), RecordsSaveModelStub::$lastUsedStructure);
        $this->assertEquals(false, RecordsSaveModelStub::$lastUsedSmartSave);
        $this->assertEquals('createRecord', RecordsSaveModelStub::$lastUsedMethod);
    }

    /**
     * @return void
     */
    public function testRun2(): void
    {
        RecordsSaveModelStub::clear();
        (new SaveCommand(new RecordsSaveModelStub(), new Structure(['id' => 2])))->withSmartUpdate()->exec();
        $this->assertEquals(new Structure(['id' => 2]), RecordsSaveModelStub::$lastUsedStructure);
        $this->assertEquals(true, RecordsSaveModelStub::$lastUsedSmartSave);
        $this->assertEquals('createRecord', RecordsSaveModelStub::$lastUsedMethod);
    }
}