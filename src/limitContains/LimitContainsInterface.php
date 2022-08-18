<?php

namespace Mnemesong\OrmCore\limitContains;

use Mnemesong\OrmCore\ableToSort\AbleToSortInterface;

/**
 * ENG: General interface for commands executed in bulk or with a limit.
 *
 * RUS: Общий интерфейс для комманд, выполняемых массово или с лимитом.
 *
 * @author Analoty Starodubtsev "Pantagruel74" Tostar74@mail.ru
 */
interface LimitContainsInterface
{
    public function withoutLimit(): self;

    public function withLimit(int $limit): self;

    public function getLimit(): int;
}