<?php

namespace Mnemesong\OrmCore\limitExecutable;

use Webmozart\Assert\Assert;

trait LimitExecutableTrait
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
        Assert::true(
            $limit >= 0,
            'Limit should be not less than 0. Zero limit means execution limits absence.'
        );
        $clone = clone $this;
        $clone->limit = $limit;
        return $clone;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }
}