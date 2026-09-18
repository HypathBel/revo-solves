<?php

namespace App\Application\Classes;

class Movie
{
    public const CHILDRENS = 2;
    public const NEW_RELEASE = 1;
    public const REGULAR = 0;

    private string $_title;
    private int $_priceCode;

    public function __construct(string $title, int $priceCode)
    {
        $this->_title = $title;
        $this->_priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->_priceCode;
    }

    public function setPriceCode(int $arg): void
    {
        $this->_priceCode = $arg;
    }

    public function getTitle(): string
    {
        return $this->_title;
    }
}