<?php

namespace Mnemesong\OrmCore\ableToSort;

interface AbleToSortInterface
{
    /**
     * @param string[] $fields
     * @return self
     */
    public function sortedBy(array $fields): self;

    /**
     * @return self
     */
    public function withoutSorting(): self;

    /**
     * @return string[]
     */
    public function getSortFields(): array;
}