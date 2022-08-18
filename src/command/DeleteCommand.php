<?php

namespace Mnemesong\OrmCore\command;

use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\ableToSort\AbleToSortTrait;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCore\limitContains\LimitContainsTrait;
use Mnemesong\OrmCore\storages\RecordsDeleteModelInterface;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\Spex\specified\SpecifiedTrait;

/**
 * ENG: An object reflecting the delete operation with a limit / mass deletion of records from the storage.
 * Configurable by specification (condition) of deletion, indication of limit and sorting for deletion limit.
 *
 * RUS: Объект отражающий операцию удаления с лимитом/массового удаления записей из хранилища.
 * Конфигурируется спецификацией (условием) удаления, указанием лимита и сортировки для лимита удаления.
 *
 * @author Analoty Starodubtsev "Pantagruel74" Tostar74@mail.ru
 */
class DeleteCommand implements AbleToSortInterface, LimitContainsInterface, SpecifiedInterface
{
    use AbleToSortTrait;
    use LimitContainsTrait;
    use SpecifiedTrait;

    protected RecordsDeleteModelInterface $deleteModel;

    public function __construct(RecordsDeleteModelInterface $deleteModel)
    {
        $this->deleteModel = $deleteModel;
    }

    public function exec(): void
    {
        $this->deleteModel->deleteRecords($this->specification, $this->limit, $this->sortFields);
    }
}