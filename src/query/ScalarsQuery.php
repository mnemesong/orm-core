<?php

namespace Mnemesong\OrmCore\query;

use Mnemesong\Fit\withCondition\WithCondInterface;
use Mnemesong\Fit\withCondition\WithCondTrait;
use Mnemesong\OrmCore\storages\ScalarsSearchModelInterface;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class ScalarsQuery implements WithCondInterface
{
    use WithCondTrait;

    /* @phpstan-ignore-next-line  */
    protected array $scalars;
    protected ScalarsSearchModelInterface $searchModel;

    /**
     * @param ScalarsSearchModelInterface $searchModel
     * @param ScalarSpecification[] $scalars
     */
    public function __construct(ScalarsSearchModelInterface $searchModel, array $scalars = [])
    {
        Assert::allIsAOf($scalars, ScalarSpecification::class);
        $this->scalars = $scalars;
        $this->searchModel = $searchModel;
    }

    /**
     * @param ScalarSpecification $scalar
     * @return $this
     */
    public function withAddScalar(ScalarSpecification $scalar): self
    {
        $clone = clone $this;
        $clone->scalars[] = $scalar;
        return $clone;
    }

    /**
     * @return ScalarSpecification[]
     */
    public function getScalars(): array
    {
        return $this->scalars;
    }

    /**
     * @param callable $filterFunc
     * @return $this
     */
    public function withScalarsFilteredBy(callable $filterFunc): self
    {
        $scalarsList = [];
        foreach ($this->scalars as $scalar)
        {
            if($filterFunc($scalar) === true) {
                $scalarsList[] = $scalar;
            }
        }
        $clone = clone $this;
        $clone->scalars = $scalarsList;
        return $clone;
    }

    /**
     * @return Structure
     */
    public function find(): Structure
    {
        return $this->searchModel->findScalars($this->scalars, $this->cond);
    }

}