<?php

namespace App\Domain\Rentals;

final class RentalLineItem
{
    public function __construct(
        private readonly string $_title,
        private readonly float $_amount,
    ) {}

    public function getTitle(): string
    {
        return $this->_title;
    }

    public function getAmount(): float
    {
        return $this->_amount;
    }
}
