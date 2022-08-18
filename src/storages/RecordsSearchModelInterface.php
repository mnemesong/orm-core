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
     * @param int $limit
     * @return StructureCollection
     */
    public function findRecords(
        array $selectFields,
        array $sortFields,
        ?SpecificationInterface $specification,
        int $limit
    ): StructureCollection;
}