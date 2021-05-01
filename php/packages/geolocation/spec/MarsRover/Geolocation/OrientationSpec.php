<?php

namespace spec\MarsRover\Geolocation;

use MarsRover\Geolocation\Orientation;
use PhpSpec\ObjectBehavior;

class OrientationSpec extends ObjectBehavior
{
    function it_can_face_north()
    {
        $this->beConstructedWith(Orientation::NORTH);

        $this->get()->shouldBe(Orientation::NORTH);
    }

    function it_can_face_east()
    {
        $this->beConstructedWith(Orientation::EAST);

        $this->get()->shouldBe(Orientation::EAST);
    }

    function it_can_face_west()
    {
        $this->beConstructedWith(Orientation::WEST);

        $this->get()->shouldBe(Orientation::WEST);
    }

    function it_can_face_south()
    {
        $this->beConstructedWith(Orientation::SOUTH);

        $this->get()->shouldBe(Orientation::SOUTH);
    }

    function it_cannot_face_anywhere_else()
    {
        $this->beConstructedWith('Somehwere else');

        $this
            ->shouldThrow(\InvalidArgumentException::class)
            ->duringInstantiation();
    }
}
