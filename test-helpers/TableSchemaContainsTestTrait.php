<?php

namespace Mnemesong\OrmCoreTestHelpers;

use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\TableSchema\ColumnSchema;
use Mnemesong\TableSchema\TableSchema;
use PHPUnit\Framework\TestCase;

trait TableSchemaContainsTestTrait
{
    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    /**
     * @param string $tableName
     * @return TableSchemaContainsInterface
     */
    abstract protected function getInitializedTableSchemaContains(string $tableName): TableSchemaContainsInterface;

    /**
     * @return void
     */
    public function testTableSchemaContainsBasics(): void
    {
        $schema1 = $this->getInitializedTableSchemaContains('stub');
        $this->useTestCase()->assertEquals(new TableSchema('stub'), $schema1->getTableSchema());

        $schema2 = $schema1->withTableSchema(
            (new TableSchema('table2'))
                ->withColumn(new ColumnSchema('id'))
        );
        $this->useTestCase()->assertEquals(new TableSchema('stub'), $schema1->getTableSchema());
        $this->useTestCase()->assertEquals(
            (new TableSchema('table2'))
                ->withColumn(new ColumnSchema('id')),
            $schema2->getTableSchema()
        );
    }
}