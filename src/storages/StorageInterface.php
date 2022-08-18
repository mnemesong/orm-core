<?php

namespace Mnemesong\OrmCore\storages;

use Mnemesong\OrmCore\query\RecordsQuery;
use Mnemesong\OrmCore\query\ScalarsQuery;

interface StorageInterface
{
    function selectRecords(): RecordsQuery;

    function selectScalars(): ScalarsQuery;
}