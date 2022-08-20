<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\Structure;

interface RecordsUpdateModelInterface extends TableSchemaContainsInterface
{
    /**
     * @param Structure $struct
     * @param SpecificationInterface|null $spec
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function updateRecords(Structure $struct, ?SpecificationInterface $spec, int $limit, array $sortFields): void;
}