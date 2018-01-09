<?php

namespace MarsRover\EventSourcing;

class AnEventHappened
{
    public function justNow(string $name, array $data): Event
    {
        return new Event($name, $data, new \DateTime());
    }
}