<?php

namespace spec\MarsRover\EventSourcing;

use MarsRover\EventSourcing\Event;
use PhpSpec\ObjectBehavior;

class AnEventHappenedSpec extends ObjectBehavior
{
    const NAME = 'something_happened';
    const DATA = [
        'message' => 'And now for something completly different',
    ];

    function it_can_create_events()
    {
        $this->justNow(self::NAME, self::DATA)->shouldHaveType(Event::class);
    }
}
