<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\OrmCore\storages\RecordsUpdateModelInterface;
use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\Structure;

class RecordsUpdateModelStub implements RecordsUpdateModelInterface
{
    public static ?Structure $lastUsedStructure = null;
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
        self::$lastUsedStructure = null;
        self::$lastUsedSpecification = null;
        self::$lastUsedLimit = null;
        self::$lastUsedSortFields = null;
        self::$lastUsedMethod = '';
    }

    /**
     * @param Structure $struct
     * @param SpecificationInterface|null $spec
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function updateRecords(Structure $struct, ?SpecificationInterface $spec, int $limit, array $sortFields): void
    {
        self::$lastUsedStructure = $struct;
        self::$lastUsedSpecification = $spec;
        self::$lastUsedLimit = $limit;
        self::$lastUsedSortFields = $sortFields;
        self::$lastUsedMethod = 'updateRecords';
    }
}