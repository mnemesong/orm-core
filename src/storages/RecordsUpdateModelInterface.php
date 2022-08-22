<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Structure\Structure;

interface RecordsUpdateModelInterface extends TableSchemaContainsInterface
{
    /**
     * @param Structure $struct
     * @param CondInterface|null $cond
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function updateRecords(Structure $struct, ?CondInterface $cond, int $limit, array $sortFields): void;
}