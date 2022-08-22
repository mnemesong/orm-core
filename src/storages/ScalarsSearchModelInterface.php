<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\Structure;

interface ScalarsSearchModelInterface extends TableSchemaContainsInterface
{
    /**
     * @param ScalarSpecification[] $scalars
     * @param CondInterface|null $spec
     * @return Structure
     */
    public function findScalars(array $scalars, ?CondInterface $spec): Structure;
}