<?php

namespace App\Domain\Rentals;

use App\Application\Classes\Rental;

final class RentalStatementCalculator
{
    private RenterTotalAmountCalculator $amountCalculator;
    private FrequentRenterPointsCalculator $frequentPointsCalculator;

    public function __construct(
        ?RenterTotalAmountCalculator $amountCalculator = null,
        ?FrequentRenterPointsCalculator $frequentPointsCalculator = null,
    ) {
        $this->amountCalculator = $amountCalculator ?? new RenterTotalAmountCalculator;
        $this->frequentPointsCalculator = $frequentPointsCalculator ?? new FrequentRenterPointsCalculator;
    }

    /**
     * @param  Rental[]  $rentals
     */
    public function calculate(string $customerName, array $rentals): StatementData
    {
        $rentalLineItems = [];
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;

        foreach ($rentals as $rental) {
            $amount = $this->amountCalculator->calculate($rental);
            $frequentRenterPoints = $this->frequentPointsCalculator->calculate($rental, $frequentRenterPoints);

            $rentalLineItems[] = new RentalLineItem($rental->getMovie()->getTitle(), $amount);
            $totalAmount += $amount;
        }

        return new StatementData($customerName, $rentalLineItems, $totalAmount, $frequentRenterPoints);
    }
}
