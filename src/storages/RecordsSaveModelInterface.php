<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Structure\Structure;

interface RecordsSaveModelInterface
{
    public function createRecord(Structure $structure, bool $smartSave): void;
}