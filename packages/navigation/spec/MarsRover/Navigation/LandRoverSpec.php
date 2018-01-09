<?php

namespace spec\MarsRover\Navigation;

use PhpSpec\ObjectBehavior;

class LandRoverSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;
    const ORIENTATION = 'north';

    function it_has_x_coordinate()
    {
        $this->beConstructedWith(
            self::X,
            self::Y,
            self::ORIENTATION
        );

        $this->getX()->shouldBe(self::X);
    }

    function it_cannot_have_non_integer_x_coordinate()
    {
        $this->beConstructedWith(
            'Nobody expects the Spanish Inquisition!',
            self::Y,
            self::ORIENTATION
        );

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_has_y_coordinate()
    {
        $this->beConstructedWith(
            self::X,
            self::Y,
            self::ORIENTATION
        );

        $this->getY()->shouldBe(self::Y);
    }

    function it_cannot_have_non_integer_y_coordinate()
    {
        $this->beConstructedWith(
            self::X,
            'No one expects the Spanish Inquisition!',
            self::ORIENTATION
        );

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }

    function it_has_an_orientation()
    {
        $this->beConstructedWith(
            self::X,
            self::Y,
            self::ORIENTATION
        );

        $this->getOrientation()->shouldBe(self::ORIENTATION);
    }

    function it_cannot_have_a_non_cardinal_orientation()
    {
        $this->beConstructedWith(
            self::X,
            self::Y,
            'A hareng!'
        );

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }
}