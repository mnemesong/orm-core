<?php

namespace Mnemesong\OrmCore\ableToRecording;

use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

trait AbleToRecordingTrait
{
    protected Structure $struct;

    /**
     * @return Structure
     */
    public function getStructure(): Structure
    {
        return $this->struct;
    }

    /**
     * @param Structure $struct
     * @return void
     */
    protected function setStructure(Structure $struct): void
    {
        Assert::notEmpty($struct->attributes(), "Structure should be not empty");
        $this->struct = $struct;
    }
}