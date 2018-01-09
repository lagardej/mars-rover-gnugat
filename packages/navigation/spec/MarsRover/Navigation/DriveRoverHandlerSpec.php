<?php

namespace spec\MarsRover\Navigation;

use MarsRover\EventSourcing\AnEventHappened;
use MarsRover\EventSourcing\Event;
use MarsRover\EventSourcing\EventStore;
use MarsRover\Navigation\DriveRover;
use MarsRover\Navigation\Events;
use MarsRover\Navigation\Instruction;
use PhpSpec\ObjectBehavior;

class DriveRoverHandlerSpec extends ObjectBehavior
{
    const DRIVING_INSTRUCTION = Instruction::MOVE_FORWARD;

    const EVENT_NAME = Events::ROVER_DRIVEN;
    const EVENT_DATA = [
        'instruction' => self::DRIVING_INSTRUCTION,
    ];

    function it_drives_a_rover_with_given_instruction(
        AnEventHappened $anEventHappened,
        Event $roverDriven,
        EventStore $eventStore
    )
    {
        $this->beConstructedWith($anEventHappened, $eventStore);
        $driveRover = new DriveRover(
            self::DRIVING_INSTRUCTION
        );

        $anEventHappened->justNow(
            self::EVENT_NAME,
            self::EVENT_DATA
        )->willReturn($roverDriven);
        $eventStore->log($roverDriven)->shouldBeCalled();

        $this->handle($driveRover);
    }
}
