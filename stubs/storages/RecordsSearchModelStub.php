<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\OrmCore\storages\RecordsSearchModelInterface;
use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

final class RecordsSearchModelStub implements RecordsSearchModelInterface
{
    /* @phpstan-ignore-next-line */
    public static array $lastSelectFields = [];
    /* @phpstan-ignore-next-line */
    public static array $lastSortFields = [];
    public static ?SpecificationInterface $lastSpecificationUsed = null;
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
        self::$lastSpecificationUsed = null;
        self::$lastUsedLimit = null;
    }

    /**
     * @param string[] $selectFields
     * @param string[] $sortFields
     * @param SpecificationInterface|null $specification
     * @param int $limit
     * @return StructureCollection
     */
    public function findRecords(
        array $selectFields,
        array $sortFields,
        ?SpecificationInterface $specification,
        int $limit
    ): StructureCollection {
        self::$lastSelectFields = $selectFields;
        self::$lastSortFields = $sortFields;
        self::$lastMethodUsed = 'findAllRecords';
        self::$lastSpecificationUsed = $specification;
        self::$lastUsedLimit = $limit;
        return new StructureCollection([]);
    }
}