<?php

namespace spec\MarsRover\Navigation;

use MarsRover\Navigation\Orientation;
use PhpSpec\ObjectBehavior;

class LandRoverSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;
    const ORIENTATION = Orientation::NORTH;

    function it_has_coordinates()
    {
        $this->beConstructedWith(
            self::X,
            self::Y,
            self::ORIENTATION
        );

        $coordinates = $this->getCoordinates();
        $coordinates->getX()->shouldBe(self::X);
        $coordinates->getY()->shouldBe(self::Y);
    }

    function it_has_an_orientation()
    {
        $this->beConstructedWith(
            self::X,
            self::Y,
            self::ORIENTATION
        );

        $this->getOrientation()->get()->shouldBe(self::ORIENTATION);
    }
}
