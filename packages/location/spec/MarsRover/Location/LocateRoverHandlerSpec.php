<?php

namespace spec\MarsRover\Location;

use MarsRover\Location\Service\FindLatestLocation;
use PhpSpec\ObjectBehavior;

class LocateRoverHandlerSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;
    const ORIENTATION = 'north';

    const LOCATION = [
        'x' => self::X,
        'y' => self::Y,
        'orientation' => self::ORIENTATION,
    ];

    function it_finds_a_rover_latest_location(
        FindLatestLocation $findLatestLocation
    )
    {
        $this->beConstructedWith($findLatestLocation);

        $findLatestLocation->find()->willReturn(self::LOCATION);

        $this->handle()->shouldBe(self::LOCATION);
    }
}
