<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\storages\RecordsDeleteModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsTrait;

class RecordsDeleteModelStub implements RecordsDeleteModelInterface
{
    use TableSchemaContainsTrait;

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
        self::$lastUsedCond = null;
        self::$lastUsedLimit = null;
        self::$lastUsedSortFields = null;
        self::$lastUsedMethod = '';
    }

    /**
     * @param CondInterface|null $cond
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function deleteRecords(?CondInterface $cond, int $limit, array $sortFields): void
    {
        self::$lastUsedCond = $cond;
        self::$lastUsedLimit = $limit;
        self::$lastUsedSortFields = $sortFields;
        self::$lastUsedMethod = 'deleteRecords';
    }
}