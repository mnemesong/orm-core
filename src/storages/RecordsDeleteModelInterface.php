<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;

interface RecordsDeleteModelInterface extends TableSchemaContainsInterface
{
    /**
     * @param CondInterface|null $cond
     * @param int $limit
     * @param string[] $sortFields
     * @return void
     */
    public function deleteRecords(?CondInterface $cond, int $limit, array $sortFields): void;
}