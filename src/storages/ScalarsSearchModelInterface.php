<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\Structure;

interface ScalarsSearchModelInterface
{
    /**
     * @param ScalarSpecification[] $scalars
     * @param SpecificationInterface|null $spec
     * @return Structure
     */
    public function findScalars(array $scalars, ?SpecificationInterface $spec): Structure;
}