<?php

namespace MarsRover\Geolocation;

class Orientation
{
    const NORTH = 'north';
    const EAST = 'east';
    const WEST = 'west';
    const SOUTH = 'south';

    const ALLOWED_ORIENTATIONS = [
        self::NORTH,
        self::EAST,
        self::WEST,
        self::SOUTH,
    ];

    private $orientation;

    public function __construct($orientation)
    {
        if (false === in_array($orientation, self::ALLOWED_ORIENTATIONS, true)) {
            throw new \InvalidArgumentException(
                'Orientation must be one of: '
                .implode(', ', self::ALLOWED_ORIENTATIONS)
            );
        }
        $this->orientation = $orientation;
    }

    public function get() : string
    {
        return $this->orientation;
    }
}
