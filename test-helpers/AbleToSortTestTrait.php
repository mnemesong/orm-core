<?php

namespace Mnemesong\OrmCoreTestHelpers;

use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use PHPUnit\Framework\TestCase;

trait AbleToSortTestTrait
{
    abstract public function getInitializedAbleToSort(): AbleToSortInterface;

    abstract public function useTestCase(): TestCase;

    public function testSorting(): void
    {
        $q1 = $this->getInitializedAbleToSort();
        $this->useTestCase()->assertEquals([], $q1->getSortFields());

        $q2 = $q1->sortedBy(['name', 'date']);
        $this->useTestCase()->assertEquals([], $q1->getSortFields());
        $this->useTestCase()->assertEquals(['name', 'date'], $q2->getSortFields());

        $q3 = $q2->withoutSorting();
        $this->useTestCase()->assertEquals([], $q3->getSortFields());
        $this->useTestCase()->assertEquals(['name', 'date'], $q2->getSortFields());
    }

    public function testSortingException1(): void
    {
        $q1 = $this->getInitializedAbleToSort();
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $q1->sortedBy([112, 'name']);
    }

    public function testSortingException2(): void
    {
        $q1 = $this->getInitializedAbleToSort();
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line */
        $q1->sortedBy([['data'], 'name']);
    }
}