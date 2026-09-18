<?php

namespace App\Application\Classes;

class Rental
{
    private Movie $_movie;
    private int $_daysRented;

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->_movie = $movie;
        $this->_daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->_daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->_movie;
    }
}