<?php

namespace Mnemesong\OrmCore\command;

use Mnemesong\OrmCore\ableToRecording\AbleToRecordingInterface;
use Mnemesong\OrmCore\ableToRecording\AbleToRecordingTrait;
use Mnemesong\OrmCore\storages\RecordsSaveModelInterface;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

/**
 * ENG: Object reflecting the operation of adding/smartly adding a new record to the repository.
 * Allows you to specify the type of operation and specify the record to be added in the form of a structure before execution.
 *
 * RUS: Объект отражающий операцию добавления/умного добавления новой записи в хранилище.
 * Позволяет уточнить тип операции и указать добавляемую запись в виде структуры перед выполнением.
 *
 * @author Analoty Starodubtsev "Pantagruel74" Tostar74@mail.ru
 */
class SaveCommand implements AbleToRecordingInterface
{
    use AbleToRecordingTrait;

    //Smart updated means storage will try rewrite saved record on duplication saved record
    //Not Smart updated means storage will throw exception on duplication saved record
    protected bool $smartUpdate = false;
    protected RecordsSaveModelInterface $recordSaveModel;

    /**
     * @param RecordsSaveModelInterface $createModel
     * @param Structure $struct
     */
    public function __construct(RecordsSaveModelInterface $createModel, Structure $struct)
    {
        $this->recordSaveModel = $createModel;
        $this->setStructure($struct);
    }

    /**
     * @return bool
     */
    public function isSmartUpdate(): bool
    {
        return $this->smartUpdate;
    }

    /**
     * @return $this
     */
    public function withSmartUpdate(): self
    {
        $clone = clone $this;
        $clone->smartUpdate = true;
        return $clone;
    }

    /**
     * @return $this
     */
    public function withHardInsert(): self
    {
        $clone = clone $this;
        $clone->smartUpdate = false;
        return $clone;
    }

    /**
     * @return RecordsSaveModelInterface
     */
    public function getRecordSaveModel(): RecordsSaveModelInterface
    {
        return $this->recordSaveModel;
    }

    /**
     * @return void
     */
    public function exec(): void
    {
        $this->recordSaveModel->createRecord($this->struct, $this->smartUpdate);
    }
}