<?php

namespace Mnemesong\OrmCore\limitContains;

use Webmozart\Assert\Assert;

trait LimitContainsTrait
{
    protected int $limit = 0;

    /**
     * @return $this
     */
    public function withoutLimit(): self
    {
        $clone = clone $this;
        $clone->limit = 0;
        return $clone;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function withLimit(int $limit): self
    {
        $clone = clone $this;
        $clone->setLimit($limit);
        return $clone;
    }

    /**
     * @param int $limit
     * @return void
     */
    protected function setLimit(int $limit): void
    {
        Assert::true(
            $limit >= 0,
            'Limit should be not less than 0. Zero limit means execution limits absence.'
        );
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}