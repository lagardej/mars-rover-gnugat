<?php

namespace MarsRover\EventSourcing;

class Event
{
    private $name;
    private $data;
    private $receivedAt;

    public function __construct(
        string $name,
        array $data,
        \DateTimeInterface $receivedAt
    )
    {
        $this->name = $name;
        $this->data = $data;
        $this->receivedAt = $receivedAt;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getReceivedAt(): \DateTimeInterface
    {
        return $this->receivedAt;
    }
}
