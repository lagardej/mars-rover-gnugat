rootProject.name = "MarsRover"

include (":event-sourcing")
project(":event-sourcing").projectDir = File(rootDir, "packages/event-sourcing")

include (":geolocation")
project(":geolocation").projectDir = File(rootDir, "packages/geolocation")

include (":location")
project(":location").projectDir = File(rootDir, "packages/location")

include (":navigation")
project(":navigation").projectDir = File(rootDir, "packages/navigation")
