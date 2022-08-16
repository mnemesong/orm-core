<?php

namespace Mnemesong\OrmCore\query;

use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\Spex\specified\SpecifiedTrait;
use Webmozart\Assert\Assert;

class Query implements SpecifiedInterface
{
    use SpecifiedTrait;

    /* @phpstan-ignore-next-line  */
    protected array $selectFields = [];
    /* @phpstan-ignore-next-line  */
    protected array $sortBy = [];

    /**
     * @param string[] $fields
     * @return self
     */
    public function withSelect(array $fields = []): self
    {
        Assert::allString($fields, 'All fields should be strings');
        $clone = clone $this;
        $clone->selectFields = $fields;
        return $clone;
    }

    /**
     * @param string[] $fields
     * @return self
     */
    public function sortedBy(array $fields = []): self
    {
        Assert::allInArray(array_values($fields), ['asc', 'desc'], 'Parameters for sort should be like '
            . '["columnName" => "asc or desc", ...]');
        $clone = clone $this;
        $clone->sortBy = $fields;
        return $clone;
    }

    /**
     * @return string[]
     */
    public function getSelectFields(): array
    {
        return $this->selectFields;
    }

    /**
     * @return string[]
     */
    public function getSortBy(): array
    {
        return $this->sortBy;
    }
}