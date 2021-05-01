<?php

namespace spec\MarsRover\Navigation;

use MarsRover\Navigation\Instruction;
use PhpSpec\ObjectBehavior;

class InstructionSpec extends ObjectBehavior
{
    const MOVE_FORWARD = Instruction::MOVE_FORWARD;
    const TURN_LEFT = Instruction::TURN_LEFT;
    const TURN_RIGHT = Instruction::TURN_RIGHT;

    const INVALID_INSTRUCTION = 'wake_up_polly_parrot';

    function it_can_be_move_forward()
    {
        $this->beConstructedWith(self::MOVE_FORWARD);

        $this->get()->shouldBe(self::MOVE_FORWARD);
    }

    function it_can_be_turn_left()
    {
        $this->beConstructedWith(self::TURN_LEFT);

        $this->get()->shouldBe(self::TURN_LEFT);
    }

    function it_can_be_turn_right()
    {
        $this->beConstructedWith(self::TURN_RIGHT);

        $this->get()->shouldBe(self::TURN_RIGHT);
    }

    function it_cannot_be_anything_else()
    {
        $this->beConstructedWith(self::INVALID_INSTRUCTION);

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }
}
