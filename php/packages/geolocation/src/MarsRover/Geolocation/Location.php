<?php

namespace MarsRover\Geolocation;

class Location
{
    private $coordinates;
    private $orientation;

    public function __construct(
        Coordinates $coordinates,
        Orientation $orientation
    )
    {
        $this->coordinates = $coordinates;
        $this->orientation = $orientation;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function getOrientation(): Orientation
    {
        return $this->orientation;
    }
}
