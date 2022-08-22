<?php

namespace Mnemesong\OrmCoreStubs\storages;

use Mnemesong\Fit\conditions\abstracts\CondInterface;
use Mnemesong\OrmCore\storages\ScalarsSearchModelInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsTrait;
use Mnemesong\Scalarex\specification\ScalarSpecification;
use Mnemesong\Structure\Structure;

class ScalarsSearchModelStub implements ScalarsSearchModelInterface
{
    use TableSchemaContainsTrait;

    /* @phpstan-ignore-next-line */
    public static array $lastScalars = [];
    public static string $lastMethodUsed = '';
    public static ?CondInterface $lastCondUsed = null;

    /**
     * @return void
     */
    public static function clear(): void
    {
        self::$lastScalars = [];
        self::$lastMethodUsed = '';
        self::$lastCondUsed = null;
    }

    /**
     * @param ScalarSpecification[] $scalars
     * @param CondInterface|null $spec
     * @return Structure
     */
    public function findScalars(array $scalars, ?CondInterface $spec): Structure
    {
        self::$lastCondUsed = $spec;
        self::$lastScalars = $scalars;
        self::$lastMethodUsed = 'findScalars';
        return new Structure([]);
    }
}