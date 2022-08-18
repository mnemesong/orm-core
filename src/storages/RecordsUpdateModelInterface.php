<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\Structure;

interface RecordsUpdateModelInterface
{
    /**
     * @param Structure $structure
     * @param SpecificationInterface|null $spec
     * @param int $limit
     * @param array $sortFields
     * @return void
     */
    public function updateRecords(Structure $structure, ?SpecificationInterface $spec, int $limit, array $sortFields): void;
}