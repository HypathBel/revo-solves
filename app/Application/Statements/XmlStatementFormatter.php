<?php

namespace App\Application\Statements;

use App\Domain\Rentals\StatementData;

final class XmlStatementFormatter implements StatementFormatterInterface
{
    public function format(StatementData $data): string
    {
        $result = '<rental-record customer-name="'.$data->getCustomerName().'">';

        foreach ($data->getRentalLineItems() as $item) {
            $result .= '<rental-line-item title="'.$item->getTitle().'" amount="'.$item->getAmount().'"/>';
        }

        $result .= '</rental-record>';

        return $result;
    }
}
