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

    /**
     * @return void
     */
    public static function clear(): void
    {
        self::$lastMethodUsed = '';
        self::$lastSelectFields = [];
        self::$lastSortFields = [];
        self::$lastSpecificationUsed = null;
    }

    /**
     * @param string[] $selectFields
     * @param string[] $sortFields
     * @param SpecificationInterface|null $specification
     * @return StructureCollection
     */
    public function findAllRecords(
        array $selectFields,
        array $sortFields,
        ?SpecificationInterface $specification
    ): StructureCollection {
        self::$lastSelectFields = $selectFields;
        self::$lastSortFields = $sortFields;
        self::$lastMethodUsed = 'findAllRecords';
        self::$lastSpecificationUsed = $specification;
        return new StructureCollection([]);
    }

    /**
     * @param string[] $selectFields
     * @param string[] $sortFields
     * @param SpecificationInterface|null $specification
     * @return Structure|null
     */
    public function findFirstRecordOrNull(
        array $selectFields,
        array $sortFields,
        ?SpecificationInterface $specification
    ): ?Structure {
        self::$lastSelectFields = $selectFields;
        self::$lastSortFields = $sortFields;
        self::$lastMethodUsed = 'findFirstRecordOrNull';
        self::$lastSpecificationUsed = $specification;
        return null;
    }
}