<?php

namespace Mnemesong\OrmCoreTestHelpers;

use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

trait AbleToRecordingTestTrait
{
    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    /**
     * @param Structure $struct
     * @return AbleToRecordingInterface
     */
    abstract protected function getAbleToRecordingWithStructure(Structure $struct): AbleToRecordingInterface;

    /**
     * @return void
     */
    public function testAbleToRecording(): void
    {
        $goodStructure = new Structure(['name' => 'Stasya', 'height' => 188]);
        $obj = $this->getAbleToRecordingWithStructure($goodStructure);
        $this->useTestCase()->assertEquals($goodStructure, $obj->getStructure());
    }

    /**
     * @return void
     */
    public function testSetStructureException(): void
    {
        $badStructure = new Structure([]);
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        $obj = $this->getAbleToRecordingWithStructure($badStructure);
    }
}