<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\collections\StructureCollection;

interface RecordsSearchModelInterface extends TableSchemaContainsInterface
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