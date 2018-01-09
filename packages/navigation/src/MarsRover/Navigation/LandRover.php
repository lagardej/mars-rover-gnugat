<?php

namespace MarsRover\Navigation;

class LandRover
{
    private $coordinates;
    private $orientation;

    public function __construct($x, $y, $orientation)
    {
        $this->coordinates = new Coordinates($x, $y);
        $this->orientation = new Orientation($orientation);
    }

    public function getCoordinates() : Coordinates
    {
        return $this->coordinates;
    }

    public function getOrientation() : Orientation
    {
        return $this->orientation;
    }
}
