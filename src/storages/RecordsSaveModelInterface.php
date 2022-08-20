<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Structure\Structure;

interface RecordsSaveModelInterface extends TableSchemaContainsInterface
{
    /**
     * @param Structure $structure
     * @param bool $smartSave
     * @return void
     */
    public function createRecord(Structure $structure, bool $smartSave): void;
}