<?php

namespace spec\MarsRover\Navigation;

use MarsRover\Geolocation\Location;
use MarsRover\Geolocation\Orientation;
use PhpSpec\ObjectBehavior;

class LandRoverSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;
    const ORIENTATION = Orientation::NORTH;

    function it_has_location()
    {
        $this->beConstructedWith(
            self::X,
            self::Y,
            self::ORIENTATION
        );

        $location = $this->getLocation();
        $location->shouldHaveType(Location::class);
        $coordinates = $location->getCoordinates();
        $coordinates->getX()->shouldBe(self::X);
        $coordinates->getY()->shouldBe(self::Y);
        $location->getOrientation()->get()->shouldBe(self::ORIENTATION);
    }
}
