<?php

namespace Mnemesong\OrmCore\ableToRecording;

use Mnemesong\Structure\Structure;

interface AbleToRecordingInterface
{
    /**
     * @return Structure
     */
    public function getStructure(): Structure;
}