package marsrover.eventsourcing

import io.kotest.core.spec.style.DescribeSpec
import io.kotest.matchers.shouldBe
import io.mockk.every
import io.mockk.mockk
import java.time.Clock
import java.time.Instant
import java.time.ZoneId

class EventSourcingSpec : DescribeSpec({
    val fixedClock = Clock.fixed(Instant.now(), ZoneId.systemDefault())
    val now = fixedClock.instant()

    describe("Event") {
        val event = mockk<Event>().also { every { it.receivedAt } returns now }

        it("has been received at an instant") {
            event.receivedAt shouldBe now
        }
    }
})
