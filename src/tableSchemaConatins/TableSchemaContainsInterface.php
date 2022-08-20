<?php

namespace Mnemesong\OrmCore\tableSchemaConatins;

use Mnemesong\TableSchema\table\TableSchema;

interface TableSchemaContainsInterface
{
    /**
     * @param TableSchema|null $schema
     * @return mixed
     */
    public function withTableSchema(TableSchema $schema): self;


    /**
     * @return TableSchema
     */
    public function getTableSchema(): TableSchema;
}