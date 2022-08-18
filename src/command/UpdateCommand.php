<?php

namespace Mnemesong\OrmCore\command;

use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingTrait;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\ableToSort\AbleToSortTrait;
use Mnemesong\OrmCore\limitExecutable\LimitExecutableInterface;
use Mnemesong\OrmCore\limitExecutable\LimitExecutableTrait;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\Spex\specified\SpecifiedTrait;

class UpdateCommand implements AbleToSortInterface, AbleToRecordingInterface, LimitExecutableInterface, SpecifiedInterface
{
    use AbleToSortTrait;
    use LimitExecutableTrait;
    use SpecifiedTrait;
    use AbleToRecordingTrait;

    public function __construct()
    {
    }
}