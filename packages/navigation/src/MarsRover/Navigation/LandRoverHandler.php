<?php

namespace MarsRover\Navigation;

use MarsRover\EventSourcing\{
    AnEventHappened,
    EventStore
};

class LandRoverHandler
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

    public function handle(LandRover $landRover)
    {
        $roverLanded = $this->anEventHappened->justNow(Events::ROVER_LANDED, [
            'x' => $landRover->getCoordinates()->getX(),
            'y' => $landRover->getCoordinates()->getY(),
            'orientation' => $landRover->getOrientation()->get(),
        ]);
        $this->eventStore->log($roverLanded);
    }
}
