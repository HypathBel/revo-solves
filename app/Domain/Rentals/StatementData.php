<?php

namespace App\Domain\Rentals;

final class StatementData
{
    /** @var RentalLineItem[] */
    private array $_rentalLineItems;

    /**
     * @param  RentalLineItem[]  $rentalLineItems
     */
    public function __construct(
        private readonly string $_customerName,
        array $rentalLineItems,
        private readonly float $_totalAmount,
        private readonly int $_frequentRenterPoints,
    ) {
        $this->_rentalLineItems = $rentalLineItems;
    }

    public function getCustomerName(): string
    {
        return $this->_customerName;
    }

    /**
     * @return RentalLineItem[]
     */
    public function getRentalLineItems(): array
    {
        return $this->_rentalLineItems;
    }

    public function getTotalAmount(): float
    {
        return $this->_totalAmount;
    }

    public function getFrequentRenterPoints(): int
    {
        return $this->_frequentRenterPoints;
    }
}
