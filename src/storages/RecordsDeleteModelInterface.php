<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Spex\specifications\SpecificationInterface;

interface RecordsDeleteModelInterface extends TableSchemaContainsInterface
{
    /**
     * @param SpecificationInterface|null $spec
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function deleteRecords(?SpecificationInterface $spec, int $limit, array $sortFields): void;
}