<?php

namespace spec\MarsRover\Geolocation;

use MarsRover\Geolocation\Coordinates;
use MarsRover\Geolocation\Orientation;
use PhpSpec\ObjectBehavior;

class LocationSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;
    const ORIENTATION = Orientation::NORTH;

    function it_has_coordinates()
    {
        $coordinates = new Coordinates(self::X, self::Y);
        $orientation = new Orientation(self::ORIENTATION);
        $this->beConstructedWith($coordinates, $orientation);

        $this->getCoordinates()->shouldBe($coordinates);
    }

    function it_has_orientation()
    {
        $coordinates = new Coordinates(self::X, self::Y);
        $orientation = new Orientation(self::ORIENTATION);
        $this->beConstructedWith($coordinates, $orientation);

        $this->getOrientation()->shouldBe($orientation);
    }
}
