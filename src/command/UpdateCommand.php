<?php

namespace Mnemesong\OrmCore\command;

use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingTrait;
use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use Mnemesong\OrmCore\ableToSort\AbleToSortTrait;
use Mnemesong\OrmCore\limitContains\LimitContainsInterface;
use Mnemesong\OrmCore\limitContains\LimitContainsTrait;
use Mnemesong\OrmCore\storages\RecordsUpdateModelInterface;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\Spex\specified\SpecifiedTrait;
use Mnemesong\Structure\Structure;

class UpdateCommand implements AbleToSortInterface, AbleToRecordingInterface, LimitContainsInterface, SpecifiedInterface
{
    use AbleToSortTrait;
    use LimitContainsTrait;
    use SpecifiedTrait;
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
        $this->recordsUpdateModel->updateRecords($this->struct, $this->specification, $this->limit, $this->sortFields);
    }
}