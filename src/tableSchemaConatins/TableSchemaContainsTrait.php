<?php

namespace Mnemesong\OrmCore\tableSchemaConatins;

use Mnemesong\TableSchema\table\TableSchema;

trait TableSchemaContainsTrait
{
    protected TableSchema $tableSchema;

    /**
     * @param TableSchema $schema
     * @return mixed
     */
    public function withTableSchema(TableSchema $schema): self
    {
        $clone = clone $this;
        $clone->tableSchema = $schema;
        return $clone;
    }

    /**
     * @return TableSchema
     */
    public function getTableSchema(): TableSchema
    {
        return $this->tableSchema;
    }
}