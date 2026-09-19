<?php

namespace App\Application\Statements;

use App\Domain\Rentals\StatementData;

final class HtmlStatementFormatter implements StatementFormatterInterface
{
    public function format(StatementData $data): string
    {
        return '<h1>Rental Record for <em>'.$data->getCustomerName().'</em></h1><p>'
            .implode(
                '',
                array_map(
                    fn ($item) => "\t".$item->getTitle()."\t".$item->getAmount()."<br>",
                    $data->getRentalLineItems()
                )
            )
            .'</p><p>Amount owed is <em>'.$data->getTotalAmount().'</em></p>'
            .'<p>You earned <em>'.$data->getFrequentRenterPoints().'</em> frequent renter points</p>';
    }
}
