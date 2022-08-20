<?php

namespace Mnemesong\OrmCoreStubs\testHelpers;

use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsTrait;
use Mnemesong\TableSchema\table\TableSchema;

class TableSchemaContainsStub implements TableSchemaContainsInterface
{
    use TableSchemaContainsTrait;

    public function __construct(string $tableSchema)
    {
        $this->tableSchema = new TableSchema($tableSchema);
    }
}