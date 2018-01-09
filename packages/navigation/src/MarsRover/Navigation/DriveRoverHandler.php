<?php

namespace MarsRover\Navigation;

use MarsRover\EventSourcing\{
    AnEventHappened,
    EventStore
};

class DriveRoverHandler
{
    private $anEventHappened;
    private $eventStore;

    public function __construct(
        AnEventHappened $anEventHappened,
        EventStore $eventStore
    )
    {
        $this->anEventHappened = $anEventHappened;
        $this->eventStore = $eventStore;
    }

    public function handle(DriveRover $driveRover)
    {
        $roverDriven = $this->anEventHappened->justNow(Events::ROVER_DRIVEN, [
            'instruction' => $driveRover->getInstruction()->get(),
        ]);
        $this->eventStore->log($roverDriven);
    }
}
