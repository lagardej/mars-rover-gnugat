package marsrover.navigation

import marsrover.eventsourcing.Event
import marsrover.eventsourcing.EventStore
import java.time.Clock
import java.time.Instant

enum class Instruction { MOVE_FORWARD, TURN_LEFT, TURN_RIGHT }

data class DriveRover(val instruction: Instruction)

class DriveRoverHandler(private val clock: Clock, private val eventStore: EventStore) {

    fun handle(driveRover: DriveRover) {
        val roverDriven = RoverDriven(driveRover.instruction, receivedAt = clock.instant())

        eventStore.log(roverDriven)
    }
}

data class RoverDriven(val instruction: Instruction, override val receivedAt: Instant) : Event(receivedAt)
