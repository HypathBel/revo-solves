<?php

namespace App\Application\Statements;

use App\Domain\Rentals\StatementData;

final class TextStatementFormatter implements StatementFormatterInterface
{
    public function format(StatementData $data): string
    {
        $result = 'Rental Record for '.$data->getCustomerName()."\n";

        foreach ($data->getRentalLineItems() as $item) {
            $result .= "\t".$item->getTitle()."\t".$item->getAmount()."\n";
        }

        $result .= 'Amount owed is '.$data->getTotalAmount()."\n";
        $result .= 'You earned '.$data->getFrequentRenterPoints().' frequent renter points';

        return $result;
    }
}
