<?php

namespace spec\MarsRover\Navigation;

use MarsRover\Navigation\Instruction;
use PhpSpec\ObjectBehavior;

class DriveRoverSpec extends ObjectBehavior
{
    const DRIVING_INSTRUCTION = Instruction::MOVE_FORWARD;

    function it_has_a_driving_instruction()
    {
        $this->beConstructedWith(
            self::DRIVING_INSTRUCTION
        );

        $this->getInstruction()->get()->shouldBe(self::DRIVING_INSTRUCTION);
    }
}
