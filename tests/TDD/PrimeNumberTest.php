<?php

namespace Tests\Unit;

use App\Application\UseCases\PrimeNumbers\PrimeNumbersPrint;
use PHPUnit\Framework\TestCase;

class PrimeNumberTest extends TestCase
{
    /**
     * Write a program that prints the prime numbers of a given input using TDD (Test Driven Development)
     */
    public function test_it_returns_empty_array_for_number_less_than_2(): void
    {
        $printPrimeNumbers = new PrimeNumbersPrint();
        $this->assertSame([], $printPrimeNumbers->execute(1));
        $this->assertSame([], $printPrimeNumbers->execute(0));
        $this->assertSame([], $printPrimeNumbers->execute(-5));
    }

    public function test_it_returns_primes_up_to_2(): void
    {
       $printPrimeNumbers = new PrimeNumbersPrint();
        $this->assertSame([2], $printPrimeNumbers->execute(2));
    }

    public function test_it_returns_primes_up_to_10(): void
    {
        $printPrimeNumbers = new PrimeNumbersPrint();
        $this->assertSame([2, 3, 5, 7], $printPrimeNumbers->execute(10));
    }

    public function test_it_returns_primes_up_to_30(): void
    {
        $printPrimeNumbers = new PrimeNumbersPrint();
        $this->assertSame([2, 3, 5, 7, 11, 13, 17, 19, 23, 29], $printPrimeNumbers->execute(30));
    }
}
