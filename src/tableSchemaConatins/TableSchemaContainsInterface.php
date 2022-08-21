<?php

namespace Mnemesong\OrmCore\tableSchemaConatins;

use Mnemesong\TableSchema\TableSchema;

interface TableSchemaContainsInterface
{
    /**
     * @param TableSchema $schema
     * @return self
     */
    public function withTableSchema(TableSchema $schema): self;


    /**
     * @return TableSchema
     */
    public function getTableSchema(): TableSchema;
}