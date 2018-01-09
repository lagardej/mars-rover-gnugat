<?php

namespace MarsRover\Navigation;

class LandRover
{
    private $location;

    public function __construct($x, $y, $orientation)
    {
        $this->location = new Location(
            new Coordinates($x, $y),
            new Orientation($orientation)
        );
    }

    public function getLocation(): Location
    {
        return $this->location;
    }
}
