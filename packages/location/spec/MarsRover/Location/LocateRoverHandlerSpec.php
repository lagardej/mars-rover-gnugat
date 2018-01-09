<?php

namespace spec\MarsRover\Location;

use MarsRover\Geolocation\Coordinates;
use MarsRover\Geolocation\Location;
use MarsRover\Geolocation\Orientation;
use MarsRover\Location\Service\FindLatestLocation;
use PhpSpec\ObjectBehavior;

class LocateRoverHandlerSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;
    const ORIENTATION = Orientation::NORTH;

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
        $location = new Location(
            new Coordinates(self::X, self::Y),
            new Orientation(self::ORIENTATION)
        );

        $findLatestLocation->find()->willReturn($location);

        $this->handle()->shouldBe($location);
    }
}
