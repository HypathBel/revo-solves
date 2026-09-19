<?php

namespace App\Application\Statements;

use App\Domain\Rentals\StatementData;

/**
 * This contract defines who an statement must be formatted and returned as a string.
 */
interface StatementFormatterInterface
{
    public function format(StatementData $data): string;
}
