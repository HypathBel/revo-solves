<?php

namespace App\Application\Classes;

use App\Application\Statements\StatementFactory;
use App\Application\Statements\StatementFormatterInterface;
use App\Domain\Rentals\RentalStatementCalculator;

class Customer
{
    private string $_name;

    /** @var Rental[] */
    private array $_rentals = [];

    private RentalStatementCalculator $statementCalculator;

    private StatementFormatterInterface $statementFormatter;

    public function __construct(string $name, ?string $statementFormat = 'text')
    {
        $this->_name = $name;
        $this->statementCalculator = new RentalStatementCalculator;
        $this->statementFormatter = StatementFactory::make($statementFormat);
    }

    public function addRental(Rental $arg): void
    {
        $this->_rentals[] = $arg;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function statement(): string
    {
        $data = $this->statementCalculator->calculate($this->getName(), $this->_rentals);
        return $this->statementFormatter->format($data);
    }
}
