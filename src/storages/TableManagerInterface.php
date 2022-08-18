<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\command\DeleteCommand;
use Mnemesong\OrmCore\command\SaveCommand;
use Mnemesong\OrmCore\command\UpdateCommand;
use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmCore\query\ScalarsQuery;
use Mnemesong\Structure\Structure;

interface TableManagerInterface
{
    /**
     * @return RecordsQuery
     */
    function getSelectRecordsQuery(): RecordsQuery;

    /**
     * @return ScalarsQuery
     */
    function getSelectScalarsQuery(): ScalarsQuery;

    /**
     * @param Structure $struct
     * @return UpdateCommand
     */
    function getUpdateAllCommand(Structure $struct): UpdateCommand;

    /**
     * @param Structure $struct
     * @return SaveCommand
     */
    function getSaveOneSmartCommand(Structure $struct): SaveCommand;

    /**
     * @param Structure $struct
     * @return SaveCommand
     */
    function getInsertOneHardCommand(Structure $struct): SaveCommand;

    /**
     * @return DeleteCommand
     */
    function getDeleteAllCommand(): DeleteCommand;

}