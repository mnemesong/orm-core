<?php

namespace Mnemesong\OrmCoreStubs\testHelpers;

use Mnemesong\OrmCore\limitExecutable\LimitExecutableInterface;
use Mnemesong\OrmCore\limitExecutable\LimitExecutableTrait;

class LimitExecutableStub implements LimitExecutableInterface
{
    use LimitExecutableTrait;
}