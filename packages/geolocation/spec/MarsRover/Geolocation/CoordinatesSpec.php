<?php

namespace spec\MarsRover\Geolocation;

use PhpSpec\ObjectBehavior;

class CoordinatesSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;

    function it_has_x_coordinate()
    {
        $this->beConstructedWith(
            self::X,
            self::Y
        );

        $this->getX()->shouldBe(self::X);
    }

    function it_cannot_have_non_integer_x_coordinate()
    {
        $this->beConstructedWith(
            'Nobody expects the Spanish Inquisition!',
            self::Y
        );

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_has_y_coordinate()
    {
        $this->beConstructedWith(
            self::X,
            self::Y
        );

        $this->getY()->shouldBe(self::Y);
    }

    function it_cannot_have_non_integer_y_coordinate()
    {
        $this->beConstructedWith(
            self::X,
            'No one expects the Spanish Inquisition!'
        );

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }
}
