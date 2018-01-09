<?php

namespace MarsRover\Location;

use MarsRover\Location\Service\FindLatestLocation;

class LocateRoverHandler
{
    private $findLatestLocation;

    public function __construct(FindLatestLocation $findLatestLocation)
    {
        $this->findLatestLocation = $findLatestLocation;
    }

    public function handle()
    {
        return $this->findLatestLocation->find();
    }
}
