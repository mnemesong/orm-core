<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Structure\collections\StructureCollection;

interface RecordsSearchModelInterface extends TableSchemaContainsInterface
{
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
    ): StructureCollection;
}