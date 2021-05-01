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
        $location = $landRover->getLocation();
        $coordinates = $location->getCoordinates();
        $orientation = $location->getOrientation();
        $roverLanded = $this->anEventHappened->justNow(Events::ROVER_LANDED, [
            'x' => $coordinates->getX(),
            'y' => $coordinates->getY(),
            'orientation' => $orientation->get(),
        ]);
        $this->eventStore->log($roverLanded);
    }
}
