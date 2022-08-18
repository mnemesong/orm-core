<?php

namespace Mnemesong\OrmCoreUnit\testHelpers;

use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCoreStubs\testHelpers\AbleToRecordingStub;
use Mnemesong\OrmCoreTestHelpers\AbleToRecordingTestTrait;
use Mnemesong\Structure\Structure;
use PHPUnit\Framework\TestCase;

class AbleToRecordingTest extends TestCase
{
    use AbleToRecordingTestTrait;

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
        return new AbleToRecordingStub($struct);
    }
}