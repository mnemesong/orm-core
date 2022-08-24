<?php

namespace Mnemesong\OrmCoreTestHelpers;

use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;
use PHPUnit\Framework\TestCase;

trait AbleToSortTestTrait
{
    /**
     * @return AbleToSortInterface
     */
    abstract protected function getInitializedAbleToSort(): AbleToSortInterface;

    /**
     * @return TestCase
     */
    abstract protected function useTestCase(): TestCase;

    /**
     * @return void
     */
    public function testSorting(): void
    {
        $q1 = $this->getInitializedAbleToSort();
        $this->useTestCase()->assertEquals([], $q1->getSortFields());

        $q2 = $q1->sortedBy(['name' => 'asc', 'date' => 'desc']);
        $this->useTestCase()->assertEquals([], $q1->getSortFields());
        $this->useTestCase()->assertEquals(['name' => 'asc', 'date' => 'desc'], $q2->getSortFields());

        $q3 = $q2->withoutSorting();
        $this->useTestCase()->assertEquals([], $q3->getSortFields());
        $this->useTestCase()->assertEquals(['name' => 'asc', 'date' => 'desc'], $q2->getSortFields());
    }

    /**
     * @return void
     */
    public function testSortingException1(): void
    {
        $q1 = $this->getInitializedAbleToSort();
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line  */
        $q1->sortedBy([112, 'name']);
    }

    /**
     * @return void
     */
    public function testSortingException2(): void
    {
        $q1 = $this->getInitializedAbleToSort();
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line */
        $q1->sortedBy([['data'], 'name']);
    }

    /**
     * @return void
     */
    public function testSortingException3(): void
    {
        $q1 = $this->getInitializedAbleToSort();
        $this->useTestCase()->expectException(\InvalidArgumentException::class);
        /* @phpstan-ignore-next-line */
        $q1->sortedBy(['name']);
    }
}