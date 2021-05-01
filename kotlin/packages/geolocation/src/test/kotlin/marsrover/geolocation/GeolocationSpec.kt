package marsrover.geolocation

import io.kotest.assertions.throwables.shouldThrow
import io.kotest.core.spec.style.DescribeSpec
import io.kotest.matchers.shouldBe

private const val X = 23
private const val Y = 42
private val ORIENTATION = Orientation.NORTH
private const val INVALID_ORIENTATION = "somewhere over the rainbow"

class GeolocationSpec : DescribeSpec({

    describe("Coordinates") {
        val coordinates = Coordinates(X, Y)

        it("has x coordinate") {
            coordinates.x shouldBe X
        }

        it("has y coordinate") {
            coordinates.y shouldBe Y
        }
    }

    describe("Orientation") {

        it("can face east") {
            Orientation.valueOf("EAST")::class shouldBe Orientation::class
        }

        it("can face north") {
            Orientation.valueOf("NORTH")::class shouldBe Orientation::class
        }

        it("can face south") {
            Orientation.valueOf("SOUTH")::class shouldBe Orientation::class
        }

        it("can face west") {
            Orientation.valueOf("WEST")::class shouldBe Orientation::class
        }

        it("cannot face anywhere else") {
            shouldThrow<IllegalArgumentException> {
                Orientation.valueOf(INVALID_ORIENTATION)
            }
        }
    }

    describe("Location") {
        val location = Location(Coordinates(X, Y), ORIENTATION)

        it("has coordinates") {
            location.coordinates shouldBe Coordinates(X, Y)
        }

        it("has an orientation") {
            location.orientation shouldBe ORIENTATION
        }
    }
})
