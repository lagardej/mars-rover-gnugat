<?php

namespace spec\MarsRover\Navigation;

use MarsRover\EventSourcing\AnEventHappened;
use MarsRover\EventSourcing\Event;
use MarsRover\Navigation\Events;
use MarsRover\EventSourcing\EventStore;
use MarsRover\Navigation\LandRover;
use MarsRover\Geolocation\Orientation;
use PhpSpec\ObjectBehavior;

class LandRoverHandlerSpec extends ObjectBehavior
{
    const X = 23;
    const Y = 42;
    const ORIENTATION = Orientation::NORTH;

    const EVENT_NAME = Events::ROVER_LANDED;
    const EVENT_DATA = [
        'x' => self::X,
        'y' => self::Y,
        'orientation' => self::ORIENTATION,
    ];

    function it_lands_a_rover_at_given_location(
        AnEventHappened $anEventHappened,
        Event $roverLanded,
        EventStore $eventStore
    )
    {
        $this->beConstructedwith($anEventHappened, $eventStore);
        $landRover = new LandRover(
            self::X,
            self::Y,
            self::ORIENTATION
        );

        $anEventHappened->justNow(
            self::EVENT_NAME,
            self::EVENT_DATA
        )->willReturn($roverLanded);
        $eventStore->log($roverLanded)->shouldBeCalled();

        $this->handle($landRover);
    }
}
