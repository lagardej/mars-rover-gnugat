<?php

namespace spec\MarsRover\EventSourcing;

use PhpSpec\ObjectBehavior;

class EventSpec extends ObjectBehavior
{
    const NAME = 'something_happened';
    const DATA = [
        'message' => 'We are the knights who say Ni!',
    ];

    function let(\DateTime $receivedAt)
    {
        $this->beConstructedWith(
            self::NAME,
            self::DATA,
            $receivedAt
        );
    }

    function it_has_a_name()
    {
        $this->getName()->shouldBe(self::NAME);
    }

    function it_has_data()
    {
        $this->getData()->shouldBe(self::DATA);
    }

    function it_has_been_received_at_a_date_and_time(\DateTime $receivedAt)
    {
        $this->getReceivedAt()->shouldBe($receivedAt);
    }
}
