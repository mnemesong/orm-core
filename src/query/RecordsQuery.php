<?php

namespace Mnemesong\OrmCore\query;

use Mnemesong\OrmCore\storages\RecordsSearchModelInterface;
use Mnemesong\Spex\specified\SpecifiedInterface;
use Mnemesong\Spex\specified\SpecifiedTrait;
use Mnemesong\Structure\collections\StructureCollection;
use Mnemesong\Structure\Structure;
use Webmozart\Assert\Assert;

class RecordsQuery implements SpecifiedInterface
{
    use SpecifiedTrait;

    /* @phpstan-ignore-next-line  */
    protected array $selectFields = [];
    /* @phpstan-ignore-next-line  */
    protected array $sortFields = [];
    protected RecordsSearchModelInterface $searchModel;

    /**
     * @param RecordsSearchModelInterface $searchModel
     */
    public function __construct(RecordsSearchModelInterface $searchModel)
    {
        $this->searchModel = $searchModel;
    }

    /**
     * @param string[] $fields
     * @return self
     */
    public function withOnlyFields(array $fields): self
    {
        Assert::allStringNotEmpty($fields, 'Fields list should be array of not empty strings');
        Assert::true(count($fields) > 0, 'Fields list should be not empty');
        $clone = clone $this;
        $clone->selectFields = $fields;
        return $clone;
    }

    /**
     * @return self
     */
    public function withAllFields(): self
    {
        $clone = clone $this;
        $clone->selectFields = [];
        return $clone;
    }

    /**
     * @param string[] $fields
     * @return self
     */
    public function sortedBy(array $fields): self
    {
        Assert::allStringNotEmpty($fields, 'Fields list should be array of not empty strings');
        $clone = clone $this;
        $clone->sortFields = $fields;
        return $clone;
    }

    /**
     * @return self
     */
    public function withoutSorting(): self
    {
        $clone = clone $this;
        $clone->sortFields = [];
        return $clone;
    }

    /**
     * @return string[]
     */
    public function getSortFields(): array
    {
        return $this->sortFields;
    }

    /**
     * @return string[]
     */
    public function getSelectFields(): array
    {
        return $this->selectFields;
    }

    /**
     * @return StructureCollection
     */
    public function findAll(): StructureCollection
    {
        return $this->searchModel->findAllRecords($this->selectFields, $this->sortFields, $this->specification);
    }

    /**
     * @return Structure|null
     */
    public function findFirstOrNull(): ?Structure
    {
        return $this->searchModel->findFirstRecordOrNull($this->selectFields, $this->sortFields, $this->specification);
    }
}