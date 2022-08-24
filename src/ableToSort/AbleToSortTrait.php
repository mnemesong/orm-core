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
        $clone = clone $this;
        $clone->setSortFields($fields);
        return $clone;
    }

    /**
     * @param string[] $fields
     * @return void
     */
    protected function setSortFields(array $fields): void
    {
        Assert::allStringNotEmpty($fields, 'Fields list should be array of not empty strings');
        Assert::allInArray($fields, ['asc', 'desc']);
        $this->sortFields = $fields;
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