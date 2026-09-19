<?php

namespace App\Application\Statements;

use App\Domain\Rentals\StatementData;

interface StatementFormatterInterface
{
    public function format(StatementData $data): string;
}
