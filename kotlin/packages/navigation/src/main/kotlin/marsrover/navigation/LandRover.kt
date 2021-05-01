package marsrover.navigation

import marsrover.eventsourcing.Event
import marsrover.eventsourcing.EventStore
import marsrover.geolocation.Coordinates
import marsrover.geolocation.Location
import marsrover.geolocation.Orientation
import java.time.Clock
import java.time.Instant

data class LandRover(private val x: Int, private val y: Int, private val orientation: Orientation) {

    val location = Location(Coordinates(x, y), orientation)
}

class LandRoverHandler(private val clock: Clock, private val eventStore: EventStore) {

    fun handle(landRover: LandRover) {
        val (coordinates, orientation) = landRover.location
        val roverLanded = RoverLanded(coordinates.x, coordinates.y, orientation, receivedAt = clock.instant())

        eventStore.log(roverLanded)
    }
}

data class RoverLanded(
    val x: Int,
    val y: Int,
    val orientation: Orientation,
    override val receivedAt: Instant
) : Event(receivedAt)
