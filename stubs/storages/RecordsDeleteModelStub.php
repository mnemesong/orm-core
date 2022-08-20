<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\OrmCore\storages\RecordsDeleteModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsTrait;
use Mnemesong\Spex\specifications\SpecificationInterface;

class RecordsDeleteModelStub implements RecordsDeleteModelInterface
{
    use TableSchemaContainsTrait;

    public static ?SpecificationInterface $lastUsedSpecification = null;
    public static ?int $lastUsedLimit = null;
    /* @phpstan-ignore-next-line  */
    public static ?array $lastUsedSortFields = null;
    public static string $lastUsedMethod = '';

    /**
     * @return void
     */
    public static function clear(): void
    {
        self::$lastUsedSpecification = null;
        self::$lastUsedLimit = null;
        self::$lastUsedSortFields = null;
        self::$lastUsedMethod = '';
    }

    /**
     * @param SpecificationInterface|null $spec
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function deleteRecords(?SpecificationInterface $spec, int $limit, array $sortFields): void
    {
        self::$lastUsedSpecification = $spec;
        self::$lastUsedLimit = $limit;
        self::$lastUsedSortFields = $sortFields;
        self::$lastUsedMethod = 'deleteRecords';
    }
}