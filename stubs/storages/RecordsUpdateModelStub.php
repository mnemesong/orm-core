<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\storages\RecordsUpdateModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsTrait;
use Mnemesong\Structure\Structure;

class RecordsUpdateModelStub implements RecordsUpdateModelInterface
{
    use TableSchemaContainsTrait;

    public static ?Structure $lastUsedStructure = null;
    public static ?CondInterface $lastUsedCond = null;
    public static ?int $lastUsedLimit = null;
    /* @phpstan-ignore-next-line  */
    public static ?array $lastUsedSortFields = null;
    public static string $lastUsedMethod = '';

    /**
     * @return void
     */
    public static function clear(): void
    {
        self::$lastUsedStructure = null;
        self::$lastUsedCond = null;
        self::$lastUsedLimit = null;
        self::$lastUsedSortFields = null;
        self::$lastUsedMethod = '';
    }

    /**
     * @param Structure $struct
     * @param CondInterface|null $cond
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function updateRecords(Structure $struct, ?CondInterface $cond, int $limit, array $sortFields): void
    {
        self::$lastUsedStructure = $struct;
        self::$lastUsedCond = $cond;
        self::$lastUsedLimit = $limit;
        self::$lastUsedSortFields = $sortFields;
        self::$lastUsedMethod = 'updateRecords';
    }
}