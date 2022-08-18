<?php

namespace Mnemesong\OrmCore\query;

use Mnemesong\OrmCore\storages\ScalarsSearchModelInterface;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\Spex\specified\SpecifiedTrait;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class ScalarsQuery implements SpecifiedInterface
{
    use SpecifiedTrait;

    protected array $scalars;
    protected ScalarsSearchModelInterface $searchModel;

    /**
     * @param ScalarsSearchModelInterface $searchModel
     * @param array $scalars
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
    public function withScalar(ScalarSpecification $scalar): self
    {
        $clone = clone $this;
        $clone->scalars[] = $scalar;
        return $clone;
    }

    /**
     * @return array
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
        return $this->searchModel->findScalars($this->scalars, $this->specification);
    }

}