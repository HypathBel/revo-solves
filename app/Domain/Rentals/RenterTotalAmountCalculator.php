<?php

namespace App\Domain\Rentals;

use App\Application\Classes\Rental;
use App\Enums\MovieType;

final class RenterTotalAmountCalculator
{
    public function calculate(Rental $rental): float
    {
        $amount = 0.0;

        switch (MovieType::tryFrom($rental->getMovie()->getPriceCode())) {
            case MovieType::REGULAR:
                $amount += 2;
                if ($rental->getDaysRented() > 2) {
                    $amount += ($rental->getDaysRented() - 2) * 1.5;
                }
                break;

            case MovieType::NEW_RELEASE:
                $amount += $rental->getDaysRented() * 3;
                break;

            case MovieType::CHILDRENS:
                $amount += 1.5;
                if ($rental->getDaysRented() > 3) {
                    $amount += ($rental->getDaysRented() - 3) * 1.5;
                }
                break;
        }

        return $amount;
    }
}
