<?php


namespace App\Application\UseCases\PrimeNumbers;


class PrimeNumbersPrint
{
    /**
     * Cambio al algoritmo de la Criba de Eratóstenes para mejorar la eficiencia en la generación de números primos.
     * Este método genera todos los números primos hasta un límite dado utilizando la Criba de Eratóstenes, que es más eficiente que verificar cada número individualmente.
     */
    public function execute(int $limit): array
    {
        if ($limit < 2) {
            return [];
        }

        $sieve = array_fill(0, $limit + 1, true);
        $sieve[0] = $sieve[1] = false;

        for ($i = 2; $i * $i <= $limit; $i++) {
            if ($sieve[$i]) {
                for ($j = $i * $i; $j <= $limit; $j += $i) {
                    $sieve[$j] = false;
                }
            }
        }

        return array_keys(array_filter($sieve));
    }

    // DEPRECATED
    private function isPrime(int $number): bool
    {
        if ($number < 2) {
            return false;
        }

        if ($number === 2) {
            return true;
        }

        if ($number % 2 === 0) {
            return false;
        }

        for ($i = 3; $i <= sqrt($number); $i += 2) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }
}