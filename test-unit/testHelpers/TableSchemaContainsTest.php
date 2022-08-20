<?php

namespace Mnemesong\OrmCoreUnit\testHelpers;

use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\OrmCoreStubs\testHelpers\TableSchemaContainsStub;
use Mnemesong\OrmCoreTestHelpers\TableSchemaContainsTestTrait;
use PHPUnit\Framework\TestCase;

class TableSchemaContainsTest extends TestCase
{
    use TableSchemaContainsTestTrait;

    /**
     * @return TestCase
     */
    protected function useTestCase(): TestCase
    {
        return $this;
    }

    /**
     * @param string $tableName
     * @return TableSchemaContainsInterface
     */
    protected function getInitializedTableSchemaContains(string $tableName): TableSchemaContainsInterface
    {
        return new TableSchemaContainsStub($tableName);
    }
}