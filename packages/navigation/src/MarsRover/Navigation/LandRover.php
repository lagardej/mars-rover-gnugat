<?php

namespace MarsRover\Navigation;

class LandRover
{
    const VALID_ORIENTATIONS = ['north', 'east', 'west', 'south'];

    private $x;
    private $y;
    private $orientation;

    public function __construct($x, $y, $orientation)
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
        if (false === in_array($orientation, self::VALID_ORIENTATIONS, true)) {
            throw new \InvalidArgumentException(
                'Orientation must be one of: '
                . implode(', ', self::VALID_ORIENTATIONS)
            );
        }
        $this->orientation = $orientation;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getOrientation(): string
    {
        return $this->orientation;
    }
}
