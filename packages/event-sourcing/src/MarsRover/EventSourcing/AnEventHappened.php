<?php

namespace MarsRover\EventSourcing;

interface AnEventHappened
{

    public function justNow($argument1, $argument2);
}
