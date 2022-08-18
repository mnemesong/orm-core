<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;

interface RecordsSearchModelInterface
{
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
    ): StructureCollection;

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
    ): ?Structure;
}