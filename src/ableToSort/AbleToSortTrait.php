<?php

namespace Mnemesong\OrmCore\ableToSort;

use Webmozart\Assert\Assert;

trait AbleToSortTrait
{
    /* @phpstan-ignore-next-line  */
    protected array $sortFields = [];

    /**
     * @param string[] $fields
     * @return self
     */
    public function sortedBy(array $fields): self
    {
        Assert::allStringNotEmpty($fields, 'Fields list should be array of not empty strings');
        $clone = clone $this;
        $clone->sortFields = $fields;
        return $clone;
    }

    /**
     * @return self
     */
    public function withoutSorting(): self
    {
        $clone = clone $this;
        $clone->sortFields = [];
        return $clone;
    }

    /**
     * @return string[]
     */
    public function getSortFields(): array
    {
        return $this->sortFields;
    }
}