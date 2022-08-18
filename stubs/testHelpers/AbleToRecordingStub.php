<?php

namespace Mnemesong\OrmCoreStubs\testHelpers;

use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingTrait;
use Mnemesong\Structure\Structure;

class AbleToRecordingStub implements AbleToRecordingInterface
{
    use AbleToRecordingTrait;

    public function __construct(Structure $structure)
    {
        $this->setStructure($structure);
    }
}