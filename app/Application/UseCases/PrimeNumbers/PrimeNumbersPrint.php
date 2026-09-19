<?php


namespace App\Application\UseCases\PrimeNumbers;


class PrimeNumbersPrint
{
    public function execute(int $number): array
    {
        if ($number < 2) {
            return [];
        }

        $primes = [];
        for ($i = 2; $i <= $number; $i++) {
            if ($this->isPrime($i)) {
                $primes[] = $i;
            }
        }

        return $primes;
    }

    private function isPrime(int $number): bool
    {
        if ($number < 2) {
            return false;
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }
}