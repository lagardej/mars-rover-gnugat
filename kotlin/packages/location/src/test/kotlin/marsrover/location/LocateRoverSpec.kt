package marsrover.location

import io.kotest.core.spec.style.DescribeSpec
import io.kotest.matchers.shouldBe
import io.mockk.every
import io.mockk.mockk
import marsrover.geolocation.Coordinates
import marsrover.geolocation.Location
import marsrover.geolocation.Orientation

private const val X = 23
private const val Y = 42
private val ORIENTATION = Orientation.NORTH

class LocateRoverSpec : DescribeSpec({

    describe("LocateRoverHandler") {
        val location = Location(Coordinates(X, Y), ORIENTATION)
        val findLatestLocation = mockk<FindLatestLocation>().also { every { it.find() } returns location }
        val locateRoverHandler = LocateRoverHandler(findLatestLocation)

        it("finds a rover latest location") {
            val actualLocation = locateRoverHandler.handle()

            actualLocation shouldBe location
        }
    }
})
