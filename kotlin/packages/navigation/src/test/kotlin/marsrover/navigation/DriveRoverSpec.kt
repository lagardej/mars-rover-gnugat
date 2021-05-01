package marsrover.navigation

import io.kotest.assertions.throwables.shouldThrow
import io.kotest.core.spec.style.DescribeSpec
import io.kotest.matchers.shouldBe
import io.mockk.*
import marsrover.eventsourcing.EventStore
import java.time.Clock
import java.time.Instant
import java.time.ZoneId

private val DRIVING_INSTRUCTION = Instruction.MOVE_FORWARD

class DriveRoverSpec : DescribeSpec({

    describe("DriveRover") {
        val driveRover = DriveRover(DRIVING_INSTRUCTION)

        it("has a driving instruction") {
            driveRover.instruction shouldBe DRIVING_INSTRUCTION
        }
    }

    describe("Instruction") {
        it("moves forward") {
            Instruction.valueOf("MOVE_FORWARD")::class shouldBe Instruction::class
        }

        it("turns left") {
            Instruction.valueOf("TURN_LEFT")::class shouldBe Instruction::class
        }

        it("turns right") {
            Instruction.valueOf("TURN_RIGHT")::class shouldBe Instruction::class
        }

        it("cannot be anything else") {
            shouldThrow<IllegalArgumentException> {
                Instruction.valueOf("WAKE_UP_POLLY_PARROT")
            }
        }
    }

    describe("DriveRoverHandler") {
        val eventStore = mockk<EventStore>().also { every { it.log(any()) } just runs }
        val fixedClock = Clock.fixed(Instant.now(), ZoneId.systemDefault())
        val driveRoverHandler = DriveRoverHandler(fixedClock, eventStore)

        it("drives a rover with given instruction") {
            driveRoverHandler.handle(DriveRover(DRIVING_INSTRUCTION))

            verify {
                eventStore.log(RoverDriven(DRIVING_INSTRUCTION, fixedClock.instant()))
            }
        }
    }
})
