package marsrover.eventsourcing

import java.time.Instant

abstract class Event(open val receivedAt: Instant)

interface EventStore {

    fun log(event: Event)
}
