<?php

namespace MarsRover\Geolocation;

class Coordinates
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        if (false === is_int($x)) {
            throw new \InvalidArgumentException(
                'X coordinate must be an integer'
            );
        }
        $this->x = $x;
        if (false === is_int($y)) {
            throw new \InvalidArgumentException(
                'Y coordinate must be an integer'
            );
        }
        $this->y = $y;
    }

    public function getX() : int
    {
        return $this->x;
    }

    public function getY() : int
    {
        return $this->y;
    }
}
