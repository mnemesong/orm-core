<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Structure\Structure;

interface RecordsSaveModelInterface
{
    /**
     * @param Structure $structure
     * @param bool $smartSave
     * @return void
     */
    public function createRecord(Structure $structure, bool $smartSave): void;
}