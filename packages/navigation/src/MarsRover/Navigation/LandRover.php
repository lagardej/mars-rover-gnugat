<?php

namespace MarsRover\Navigation;

class LandRover
{
    const VALID_ORIENTATIONS = ['north', 'east', 'west', 'south'];

    private $coordinates;
    private $orientation;

    public function __construct($x, $y, $orientation)
    {
        $this->coordinates = new Coordinates($x, $y);
        if (false === in_array($orientation, self::VALID_ORIENTATIONS, true)) {
            throw new \InvalidArgumentException(
                'Orientation must be one of: '
                . implode(', ', self::VALID_ORIENTATIONS)
            );
        }
        $this->orientation = $orientation;
    }

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function getOrientation(): string
    {
        return $this->orientation;
    }
}
