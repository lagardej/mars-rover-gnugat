<?php

namespace MarsRover\Location\Service;

use MarsRover\Geolocation\Location;

interface FindLatestLocation
{
    public function find(): Location;
}
