<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\storages\RecordsSearchModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsTrait;
use Mnemesong\Structure\collections\StructureCollection;

final class RecordsSearchModelStub implements RecordsSearchModelInterface
{
    use TableSchemaContainsTrait;

    /* @phpstan-ignore-next-line */
    public static array $lastSelectFields = [];
    /* @phpstan-ignore-next-line */
    public static array $lastSortFields = [];
    public static ?CondInterface $lastCondUsed = null;
    public static string $lastMethodUsed = '';
    public static ?int $lastUsedLimit = null;

    /**
     * @return void
     */
    public static function clear(): void
    {
        self::$lastMethodUsed = '';
        self::$lastSelectFields = [];
        self::$lastSortFields = [];
        self::$lastCondUsed = null;
        self::$lastUsedLimit = null;
    }

    /**
     * @param string[] $selectFields
     * @param string[] $sortFields
     * @param CondInterface|null $cond
     * @param int $limit
     * @return StructureCollection
     */
    public function findRecords(
        array          $selectFields,
        array          $sortFields,
        ?CondInterface $cond,
        int            $limit
    ): StructureCollection {
        self::$lastSelectFields = $selectFields;
        self::$lastSortFields = $sortFields;
        self::$lastMethodUsed = 'findAllRecords';
        self::$lastCondUsed = $cond;
        self::$lastUsedLimit = $limit;
        return new StructureCollection([]);
    }
}