<?php

namespace MarsRover\Location;

use MarsRover\Geolocation\Location;
use MarsRover\Location\Service\FindLatestLocation;

class LocateRoverHandler
{
    private $findLatestLocation;

    public function __construct(FindLatestLocation $findLatestLocation)
    {
        $this->findLatestLocation = $findLatestLocation;
    }

    public function handle() : Location
    {
        return $this->findLatestLocation->find();
    }
}
