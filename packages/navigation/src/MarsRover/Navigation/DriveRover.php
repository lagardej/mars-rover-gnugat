<?php

namespace MarsRover\Navigation;

class DriveRover
{
    const VALID_INSTRUCTIONS = [
        'move_forward',
        'turn_left',
        'turn_right',
    ];

    private $instruction;

    public function __construct($instruction)
    {
        if (false === in_array($instruction, self::VALID_INSTRUCTIONS, true)) {
            throw new \InvalidArgumentException(
                'Instruction should be one of: '
                . implode(', ', self::VALID_INSTRUCTIONS)
            );
        }
        $this->instruction = $instruction;
    }

    public function getInstruction(): string
    {
        return $this->instruction;
    }
}
