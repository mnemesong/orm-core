<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\command\DeleteCommand;
use Mnemesong\OrmCore\command\SaveCommand;
use Mnemesong\OrmCore\command\UpdateCommand;
use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmCore\query\ScalarsQuery;
use Mnemesong\OrmCore\tableSchemaConatins\TableSchemaContainsInterface;
use Mnemesong\Structure\Structure;

interface TableManagerInterface extends TableSchemaContainsInterface
{
    /**
     * @return RecordsQuery
     */
    public function selectRecordsQuery(): RecordsQuery;

    /**
     * @return ScalarsQuery
     */
    public function selectScalarsQuery(): ScalarsQuery;

    /**
     * @param Structure $struct
     * @return UpdateCommand
     */
    public function updateAllCommand(Structure $struct): UpdateCommand;

    /**
     * @param Structure $struct
     * @return SaveCommand
     */
    public function saveOneSmartCommand(Structure $struct): SaveCommand;

    /**
     * @param Structure $struct
     * @return SaveCommand
     */
    public function insertOneHardCommand(Structure $struct): SaveCommand;

    /**
     * @return DeleteCommand
     */
    public function deleteAllCommand(): DeleteCommand;

}