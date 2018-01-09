<?php

namespace spec\MarsRover\Navigation;

use PhpSpec\ObjectBehavior;

class DriveRoverSpec extends ObjectBehavior
{
    const DRIVING_INSTRUCTION = 'move_forward';
    const INVALID_DRIVING_INSTRUCTION = 'wake_up_polly_parrot';

    function it_has_a_driving_instruction()
    {
        $this->beConstructedWith(
            self::DRIVING_INSTRUCTION
        );

        $this->getInstruction()->shouldBe(self::DRIVING_INSTRUCTION);
    }

    function it_cannot_have_invalid_instruction()
    {
        $this->beConstructedWith(
            self::INVALID_DRIVING_INSTRUCTION
        );

        $this->shouldThrow(
            \InvalidArgumentException::class
        )->duringInstantiation();
    }
}
