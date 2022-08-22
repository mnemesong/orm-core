<?php

namespace Mnemesong\OrmCore\command;

use Mnemesong\Fit\withCondition\WithCondInterface;
use Mnemesong\Fit\withCondition\WithCondTrait;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingTrait;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\ableToSort\AbleToSortTrait;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCore\limitContains\LimitContainsTrait;
use Mnemesong\OrmCore\storages\RecordsUpdateModelInterface;
use Mnemesong\Structure\Structure;

class UpdateCommand implements AbleToSortInterface, AbleToRecordingInterface, LimitContainsInterface, WithCondInterface
{
    use AbleToSortTrait;
    use LimitContainsTrait;
    use WithCondTrait;
    use AbleToRecordingTrait;

    protected RecordsUpdateModelInterface $recordsUpdateModel;

    /**
     * @param RecordsUpdateModelInterface $recordsUpdateModel
     * @param Structure $structure
     */
    public function __construct(RecordsUpdateModelInterface $recordsUpdateModel, Structure $structure)
    {
        $this->recordsUpdateModel = $recordsUpdateModel;
        $this->setStructure($structure);
    }

    /**
     * @return void
     */
    public function exec(): void
    {
        $this->recordsUpdateModel->updateRecords($this->struct, $this->cond, $this->limit, $this->sortFields);
    }
}