package marsrover.navigation

import io.kotest.core.spec.style.DescribeSpec
import io.kotest.matchers.shouldBe
import io.mockk.*
import marsrover.eventsourcing.EventStore
import marsrover.geolocation.Coordinates
import marsrover.geolocation.Location
import marsrover.geolocation.Orientation
import java.time.Clock
import java.time.Instant
import java.time.ZoneId

private const val X = 23
private const val Y = 42
private val ORIENTATION = Orientation.NORTH

class LandRoverSpec : DescribeSpec({

    describe("LandRover") {
        val landRover = LandRover(X, Y, ORIENTATION)

        it("has location") {
            landRover.location shouldBe Location(Coordinates(X, Y), ORIENTATION)
        }
    }

    describe("LandRoverHandler") {
        val eventStore = mockk<EventStore>().also { every { it.log(any()) } just runs }
        val fixedClock = Clock.fixed(Instant.now(), ZoneId.systemDefault())
        val landRoverHandler = LandRoverHandler(fixedClock, eventStore)

        it("lands a rover at given location") {
            landRoverHandler.handle(LandRover(X, Y, ORIENTATION))

            verify {
                eventStore.log(RoverLanded(X, Y, ORIENTATION, fixedClock.instant()))
            }
        }
    }
})
