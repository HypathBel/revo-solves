<?php

namespace App\Domain\Rentals;

use App\Application\Classes\Rental;
use App\Enums\MovieType;

final class FrequentRenterPointsCalculator
{
    public function calculate(Rental $rental, int $points): int
    {
        $points++;

        if (
            MovieType::tryFrom($rental->getMovie()->getPriceCode()) === MovieType::NEW_RELEASE
            && $rental->getDaysRented() > 1
        ) {
            $points++;
        }

        return $points;
    }
}
