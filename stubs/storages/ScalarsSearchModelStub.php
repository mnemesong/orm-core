<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\OrmCore\storages\ScalarsSearchModelInterface;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Spex\specifications\SpecificationInterface;
use Mnemesong\Structure\Structure;

class ScalarsSearchModelStub implements ScalarsSearchModelInterface
{
    /* @phpstan-ignore-next-line */
    public static array $lastScalars = [];
    public static string $lastMethodUsed = '';
    public static ?SpecificationInterface $lastSpecificationUsed = null;

    /**
     * @return void
     */
    public static function clear(): void
    {
        self::$lastScalars = [];
        self::$lastMethodUsed = '';
        self::$lastSpecificationUsed = null;
    }

    /**
     * @param ScalarSpecification[] $scalars
     * @param SpecificationInterface|null $spec
     * @return Structure
     */
    public function findScalars(array $scalars, ?SpecificationInterface $spec): Structure
    {
        self::$lastSpecificationUsed = $spec;
        self::$lastScalars = $scalars;
        self::$lastMethodUsed = 'findScalars';
        return new Structure([]);
    }
}