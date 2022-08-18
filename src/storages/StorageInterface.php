<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmCore\query\ScalarsQuery;

interface StorageInterface
{
    /**
     * @return RecordsQuery
     */
    function selectRecords(): RecordsQuery;

    /**
     * @return ScalarsQuery
     */
    function selectScalars(): ScalarsQuery;
}