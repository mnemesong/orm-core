<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\OrmCore\storages\RecordsSaveModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsTrait;
use Mnemesong\Structure\Structure;

class RecordsSaveModelStub implements RecordsSaveModelInterface
{
    use TableSchemaContainsTrait;

    public static ?Structure $lastUsedStructure = null;
    public static ?bool $lastUsedSmartSave = null;
    public static string $lastUsedMethod = '';

    public static function clear(): void
    {
        self::$lastUsedStructure = null;
        self::$lastUsedSmartSave = null;
        self::$lastUsedMethod = '';
    }

    public function createRecord(Structure $structure, bool $smartSave): void
    {
        self::$lastUsedStructure = $structure;
        self::$lastUsedSmartSave = $smartSave;
        self::$lastUsedMethod = 'createRecord';
    }
}