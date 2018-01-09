<?php

namespace MarsRover\Navigation;

class Instruction
{
    const MOVE_FORWARD = 'move_forward';
    const TURN_LEFT = 'turn_left';
    const TURN_RIGHT = 'turn_right';

    const VALID_INSTRUCTIONS = [
        self::MOVE_FORWARD,
        self::TURN_LEFT,
        self::TURN_RIGHT,
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

    public function get(): string
    {
        return $this->instruction;
    }
}
