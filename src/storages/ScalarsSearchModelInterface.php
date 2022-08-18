<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\Structure;

interface ScalarsSearchModelInterface
{
    public function findScalars(array $scalars, ?SpecificationInterface $spec): Structure;
}